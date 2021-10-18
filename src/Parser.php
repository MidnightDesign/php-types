<?php

declare(strict_types=1);

namespace PhpTypes;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use PhpTypesParser\Context\CallableExprContext;
use PhpTypesParser\Context\CallableTypeContext;
use PhpTypesParser\Context\CurlyArrayContext;
use PhpTypesParser\Context\CurlyArrayEntryContext;
use PhpTypesParser\Context\CurlyArrayExprContext;
use PhpTypesParser\Context\GenericContext;
use PhpTypesParser\Context\GenericExprContext;
use PhpTypesParser\Context\IntersectionContext;
use PhpTypesParser\Context\SimpleExprContext;
use PhpTypesParser\Context\TypeExprContext;
use PhpTypesParser\Context\UnionContext;
use PhpTypesParser\PhpTypesLexer;
use PhpTypesParser\PhpTypesParser;

use function assert;
use function is_array;

class Parser
{
    public static function parse(string $typeString): TypeInterface
    {
        $parser = new PhpTypesParser(
            new CommonTokenStream(
                new PhpTypesLexer(
                    InputStream::fromString($typeString)
                )
            )
        );
        return self::fromTypeExpr($parser->typeExpr());
    }

    private static function fromTypeExpr(TypeExprContext $context): TypeInterface
    {
        if ($context instanceof SimpleExprContext) {
            return SimpleType::create($context->getText());
        }
        if ($context instanceof GenericExprContext) {
            $generic = $context->generic();
            assert($generic !== null);
            return self::fromGeneric($generic);
        }
        if ($context instanceof CurlyArrayExprContext) {
            $curlyArray = $context->curlyArray();
            assert($curlyArray !== null);
            return self::fromCurlyArray($curlyArray);
        }
        if ($context instanceof CallableExprContext) {
            $callableType = $context->callableType();
            assert($callableType !== null);
            return self::fromCallable($callableType);
        }
        if ($context instanceof UnionContext) {
            return self::fromUnion($context);
        }
        assert($context instanceof IntersectionContext);
        return self::fromIntersection($context);
    }

    private static function fromGeneric(GenericContext $generic): TypeInterface
    {
        $typeArguments = [];
        $typeExpr = $generic->typeExpr();
        assert(is_array($typeExpr));
        foreach ($typeExpr as $type) {
            $typeArguments[] = self::fromTypeExpr($type);
        }
        $identifier = $generic->Identifier();
        assert($identifier !== null);
        $typeName = $identifier->getText();
        assert($typeName !== null);
        return SimpleType::generic($typeName, $typeArguments);
    }

    private static function fromCurlyArray(CurlyArrayContext $context): TypeInterface
    {
        $entries = $context->curlyArrayEntry();
        assert(is_array($entries));
        $firstKey = $entries[0]->Identifier();
        if ($firstKey === null) {
            $items = [];
            $entries = $context->curlyArrayEntry();
            assert(is_array($entries));
            foreach ($entries as $entry) {
                $entryType = $entry->typeExpr();
                assert($entryType !== null);
                $items[] = self::fromTypeExpr($entryType);
            }
            return new TupleType($items);
        }
        $fields = [];
        /** @var list<CurlyArrayEntryContext> $curlyArrayEntry */
        $curlyArrayEntry = $context->curlyArrayEntry();
        foreach ($curlyArrayEntry as $entry) {
            $identifier = $entry->Identifier();
            assert($identifier !== null);
            $fieldName = $identifier->getText();
            assert($fieldName !== null);
            $entryType = $entry->typeExpr();
            assert($entryType !== null);
            $fields[$fieldName] = [
                'type' => self::fromTypeExpr($entryType),
                'optional' => $entry->optional !== null,
            ];
        }
        return StructType::create($fields);
    }

    private static function fromCallable(CallableTypeContext $callable): CallableType
    {
        $arguments = [];
        $argumentList = $callable->argumentList();
        if ($argumentList !== null) {
            /** @var list<TypeExprContext> $typeExpr */
            $typeExpr = $argumentList->typeExpr();
            foreach ($typeExpr as $type) {
                $arguments[] = self::fromTypeExpr($type);
            }
        }
        $returnType = $callable->returnType();
        $return = null;
        if ($returnType !== null) {
            $typeExpr = $returnType->typeExpr();
            assert($typeExpr !== null);
            $return = self::fromTypeExpr($typeExpr);
        }
        return new CallableType($arguments, $return);
    }

    private static function fromUnion(UnionContext $context): UnionType
    {
        $alternatives = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $alternatives[] = self::parse($type->getText());
        }
        return UnionType::create($alternatives);
    }

    private static function fromIntersection(IntersectionContext $context): IntersectionType
    {
        $types = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $types[] = self::parse($type->getText());
        }
        return IntersectionType::create($types);
    }
}
