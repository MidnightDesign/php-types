<?php

declare(strict_types=1);

namespace PhpTypes;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use PhpTypes\Exception\ParseError;
use PhpTypesParser\Context\CallableExprContext;
use PhpTypesParser\Context\CallableTypeContext;
use PhpTypesParser\Context\CurlyArrayContext;
use PhpTypesParser\Context\CurlyArrayEntryContext;
use PhpTypesParser\Context\CurlyArrayExprContext;
use PhpTypesParser\Context\IntersectionContext;
use PhpTypesParser\Context\IntLiteralExprContext;
use PhpTypesParser\Context\ParenExprContext;
use PhpTypesParser\Context\SimpleExprContext;
use PhpTypesParser\Context\StringLiteralContext;
use PhpTypesParser\Context\StringLiteralExprContext;
use PhpTypesParser\Context\TypeExprContext;
use PhpTypesParser\Context\UnionContext;
use PhpTypesParser\PhpTypesLexer;
use PhpTypesParser\PhpTypesParser;
use Throwable;

use function assert;
use function is_array;

/**
 * See https://github.com/vimeo/psalm/issues/6928#issuecomment-978144437
 * @phpstan-type ListOfTypes list<TypeInterface>
 * @phpstan-type Resolve callable(string, ListOfTypes=): TypeInterface
 */
final class Parser
{
    /**
     * @param Resolve $resolve
     */
    public static function parse(string $typeString, callable $resolve): TypeInterface
    {
        try {
            $parser = new PhpTypesParser(
                new CommonTokenStream(
                    new PhpTypesLexer(
                        InputStream::fromString($typeString)
                    )
                )
            );
            return self::fromTypeExpr($parser->typeExpr(), $resolve);
        } catch (Throwable $error) {
            throw new ParseError($error->getMessage(), 0, $error);
        }
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromTypeExpr(TypeExprContext $context, callable $resolve): TypeInterface
    {
        if ($context instanceof ParenExprContext) {
            $parenContents = $context->typeExpr();
            assert($parenContents !== null);
            return self::fromTypeExpr($parenContents, $resolve);
        }
        if ($context instanceof SimpleExprContext) {
            return self::fromGeneric($context, $resolve);
        }
        if ($context instanceof CurlyArrayExprContext) {
            $curlyArray = $context->curlyArray();
            assert($curlyArray !== null);
            return self::fromCurlyArray($curlyArray, $resolve);
        }
        if ($context instanceof CallableExprContext) {
            $callableType = $context->callableType();
            assert($callableType !== null);
            return self::fromCallable($callableType, $resolve);
        }
        if ($context instanceof UnionContext) {
            return self::fromUnion($context, $resolve);
        }
        if ($context instanceof StringLiteralExprContext) {
            $stringLiteral = $context->stringLiteral();
            assert($stringLiteral !== null);
            return self::fromStringLiteral($stringLiteral);
        }
        if ($context instanceof IntLiteralExprContext) {
            return new IntLiteralType((int)$context->getText());
        }
        assert($context instanceof IntersectionContext);
        return self::fromIntersection($context, $resolve);
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromGeneric(SimpleExprContext $context, callable $resolve): TypeInterface
    {
        $typeList = $context->typeList();
        if ($typeList === null) {
            return $resolve($context->getText());
        }
        $typeArguments = [];
        $typeExpr = $typeList->typeExpr();
        assert(is_array($typeExpr));
        foreach ($typeExpr as $type) {
            $typeArguments[] = self::fromTypeExpr($type, $resolve);
        }
        $identifier = $context->Identifier();
        assert($identifier !== null);
        $typeName = $identifier->getText();
        assert($typeName !== null);
        return $resolve($typeName, $typeArguments);
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromCurlyArray(CurlyArrayContext $context, callable $resolve): TypeInterface
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
                $items[] = self::fromTypeExpr($entryType, $resolve);
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
                'type' => self::fromTypeExpr($entryType, $resolve),
                'optional' => $entry->optional !== null,
            ];
        }
        return StructType::create($fields);
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromCallable(CallableTypeContext $callable, callable $resolve): CallableType
    {
        $arguments = [];
        $argumentList = $callable->typeList();
        if ($argumentList !== null) {
            /** @var list<TypeExprContext> $typeExpr */
            $typeExpr = $argumentList->typeExpr();
            foreach ($typeExpr as $type) {
                $arguments[] = self::fromTypeExpr($type, $resolve);
            }
        }
        $returnType = $callable->typeExpr();
        $return = null;
        if ($returnType !== null) {
            $return = self::fromTypeExpr($returnType, $resolve);
        }
        return new CallableType($arguments, $return);
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromUnion(UnionContext $context, callable $resolve): TypeInterface
    {
        $alternatives = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $alternatives[] = self::parse($type->getText(), $resolve);
        }
        return UnionType::create($alternatives);
    }

    /**
     * @param Resolve $resolve
     */
    private static function fromIntersection(IntersectionContext $context, callable $resolve): IntersectionType
    {
        $types = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $types[] = self::parse($type->getText(), $resolve);
        }
        return IntersectionType::create($types);
    }

    private static function fromStringLiteral(StringLiteralContext $stringLiteral): StringLiteralType
    {
        $identifier = $stringLiteral->Identifier();
        $text = $identifier === null ? '' : $identifier->getText();
        assert($text !== null);
        return new StringLiteralType($text);
    }
}
