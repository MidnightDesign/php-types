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
            self::$global = new self();
            self::$global->register('mixed', MixedType::instance());
            self::$global->register('int', IntType::instance());
            self::$global->register('string', StringType::instance());
            self::$global->register('float', FloatType::instance());
            self::$global->register('bool', BoolType::instance());
            self::$global->register('void', VoidType::instance());
            self::$global->register('true', BoolValueType::true());
            self::$global->register('false', BoolValueType::false());
            self::$global->register('callable', new CallableType([]));
            self::$global->register('object', ObjectType::instance());
            self::$global->register('null', NullType::instance());
        }
        return self::$global;
    }

    public function register(string $alias, TypeInterface $type): void
    {
        $this->types[$alias] = $type;
    }

    public function parse(string $string): TypeInterface
    {
        return Parser::parse($string, Closure::fromCallable([$this, 'resolve']));
    }

    private function resolve(string $name): TypeInterface
    {
        if (isset($this->types[$name])) {
            return $this->types[$name];
        }
        if ($this->parent !== null) {
            return $this->parent->resolve($name);
        }
        throw new Exception("Unknown type: $name");
    }
}
