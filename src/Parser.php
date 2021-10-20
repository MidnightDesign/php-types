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
use PhpTypesParser\Context\IntLiteralExprContext;
use PhpTypesParser\Context\SimpleExprContext;
use PhpTypesParser\Context\StringLiteralContext;
use PhpTypesParser\Context\StringLiteralExprContext;
use PhpTypesParser\Context\TypeExprContext;
use PhpTypesParser\Context\UnionContext;
use PhpTypesParser\PhpTypesLexer;
use PhpTypesParser\PhpTypesParser;

use function assert;
use function is_array;

/**
 * @psalm-type ResolveSymbol callable(string): TypeInterface
 */
final class Parser
{
    /** @var ResolveSymbol */
    private $resolveSymbol;

    private function __construct()
    {
        $this->resolveSymbol = static fn(string $symbol): TypeInterface => SimpleType::create($symbol);
    }

    public static function create(?Scope $scope = null): self
    {
        $parser = new self();
        if ($scope !== null) {
            $parser->resolveSymbol = static fn(string $symbol): TypeInterface => $scope->resolve($symbol);
        }
        return $parser;
    }

    public function parse(string $typeString): TypeInterface
    {
        $parser = new PhpTypesParser(
            new CommonTokenStream(
                new PhpTypesLexer(
                    InputStream::fromString($typeString)
                )
            )
        );
        return $this->fromTypeExpr($parser->typeExpr());
    }

    private function fromTypeExpr(TypeExprContext $context): TypeInterface
    {
        if ($context instanceof SimpleExprContext) {
            return ($this->resolveSymbol)($context->getText());
        }
        if ($context instanceof GenericExprContext) {
            $generic = $context->generic();
            assert($generic !== null);
            return $this->fromGeneric($generic);
        }
        if ($context instanceof CurlyArrayExprContext) {
            $curlyArray = $context->curlyArray();
            assert($curlyArray !== null);
            return $this->fromCurlyArray($curlyArray);
        }
        if ($context instanceof CallableExprContext) {
            $callableType = $context->callableType();
            assert($callableType !== null);
            return $this->fromCallable($callableType);
        }
        if ($context instanceof UnionContext) {
            return $this->fromUnion($context);
        }
        if ($context instanceof StringLiteralExprContext) {
            $stringLiteral = $context->stringLiteral();
            assert($stringLiteral !== null);
            return $this->fromStringLiteral($stringLiteral);
        }
        if ($context instanceof IntLiteralExprContext) {
            return new IntLiteralType((int)$context->getText());
        }
        assert($context instanceof IntersectionContext);
        return $this->fromIntersection($context);
    }

    private function fromGeneric(GenericContext $generic): TypeInterface
    {
        $typeArguments = [];
        $typeExpr = $generic->typeExpr();
        assert(is_array($typeExpr));
        foreach ($typeExpr as $type) {
            $typeArguments[] = $this->fromTypeExpr($type);
        }
        $identifier = $generic->Identifier();
        assert($identifier !== null);
        $typeName = $identifier->getText();
        assert($typeName !== null);
        return SimpleType::generic($typeName, $typeArguments);
    }

    private function fromCurlyArray(CurlyArrayContext $context): TypeInterface
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
                $items[] = $this->fromTypeExpr($entryType);
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
                'type' => $this->fromTypeExpr($entryType),
                'optional' => $entry->optional !== null,
            ];
        }
        return StructType::create($fields);
    }

    private function fromCallable(CallableTypeContext $callable): CallableType
    {
        $arguments = [];
        $argumentList = $callable->argumentList();
        if ($argumentList !== null) {
            /** @var list<TypeExprContext> $typeExpr */
            $typeExpr = $argumentList->typeExpr();
            foreach ($typeExpr as $type) {
                $arguments[] = $this->fromTypeExpr($type);
            }
        }
        $returnType = $callable->returnType();
        $return = null;
        if ($returnType !== null) {
            $typeExpr = $returnType->typeExpr();
            assert($typeExpr !== null);
            $return = $this->fromTypeExpr($typeExpr);
        }
        return new CallableType($arguments, $return);
    }

    private function fromUnion(UnionContext $context): UnionType
    {
        $alternatives = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $alternatives[] = $this->parse($type->getText());
        }
        return UnionType::create($alternatives);
    }

    private function fromIntersection(IntersectionContext $context): IntersectionType
    {
        $types = [];
        /** @var list<TypeExprContext> $typeExpr */
        $typeExpr = $context->typeExpr();
        foreach ($typeExpr as $type) {
            $types[] = $this->parse($type->getText());
        }
        return IntersectionType::create($types);
    }

    private function fromStringLiteral(StringLiteralContext $stringLiteral): StringLiteralType
    {
        $identifier = $stringLiteral->Identifier();
        assert($identifier !== null);
        $text = $identifier->getText();
        assert($text !== null);
        return new StringLiteralType($text);
    }
}
