<?php

declare(strict_types=1);

namespace PhpTypes;

use Closure;
use Exception;

final class Scope
{
    private static Scope|null $global = null;
    /** @var array<string, TypeInterface> */
    private array $types = [];
    /** @var array<string, class-string<GenericTypeInterface>> */
    private array $genericTypes = [];
    private ?Scope $parent = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        $scope = new self();
        $scope->parent = self::global();
        return $scope;
    }

    private static function global(): self
    {
        if (self::$global === null) {
            $global = new self();
            $global->register('mixed', MixedType::instance());
            $global->register('int', IntType::instance());
            $global->register('string', StringType::instance());
            $global->register('non-empty-string', StringType::nonEmpty());
            $global->register('float', FloatType::instance());
            $global->register('bool', BoolType::instance());
            $global->register('void', VoidType::instance());
            $global->register('true', BoolValueType::true());
            $global->register('false', BoolValueType::false());
            $global->register('callable', new CallableType([]));
            $global->register('object', ObjectType::instance());
            $global->register('null', NullType::instance());
            $global->register('array-key', WellKnown::arrayKey());
            $global->register('iterable', IterableType::class);
            $global->register('list', ListType::class);
            $global->register('array', ArrayType::class);
            $global->register('diff', DiffType::class);
            self::$global = $global;
        }
        return self::$global;
    }

    /**
     * @param TypeInterface|class-string<GenericTypeInterface> $type
     */
    public function register(string $name, TypeInterface|string $type): void
    {
        if ($type instanceof TypeInterface) {
            $this->types[$name] = $type;
        } else {
            $this->genericTypes[$name] = $type;
        }
    }

    public function parse(string $string): TypeInterface
    {
        return Parser::parse($string, Closure::fromCallable([$this, 'resolve']));
    }

    /**
     * @param list<TypeInterface> $typeParameters
     */
    private function resolve(string $name, ?array $typeParameters = null): TypeInterface
    {
        $type = $this->types[$name] ?? null;
        if ($type !== null) {
            return $type;
        }
        $genericType = $this->genericTypes[$name] ?? null;
        if ($genericType !== null) {
            return $genericType::withTypeParameters($typeParameters ?? []);
        }
        if ($this->parent !== null) {
            return $this->parent->resolve($name, $typeParameters);
        }
        throw new Exception("Unknown type: $name");
    }
}
