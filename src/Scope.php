<?php

declare(strict_types=1);

namespace PhpTypes;

use PhpTypes\Exception\UnknownSymbolException;

final class Scope
{
    private Parser $parser;
    /** @var array<string, ClassType> */
    private array $classes = [];
    /** @var array<string, string> */
    private array $aliases = [];
    private self|null $parent = null;

    private function __construct()
    {
        $this->parser = Parser::create($this);
    }

    public static function create(): self
    {
        return new self();
    }

    public function addClass(ClassType $class): void
    {
        $this->classes[(string)$class] = $class;
    }

    public function addAlias(string $alias, string $for): void
    {
        $this->aliases[$alias] = $for;
    }

    public function isSubtype(string $subtype, string $supertype): bool
    {
        return $this->parser->parse($supertype)->isSupertypeOf($this->parser->parse($subtype));
    }

    public function resolve(string $symbol): TypeInterface
    {
        while (true) {
            $class = $this->classes[$symbol] ?? null;
            if ($class !== null) {
                return $class;
            }
            $alias = $this->aliases[$symbol] ?? null;
            if ($alias === null) {
                if ($this->parent === null) {
                    throw UnknownSymbolException::fromSymbol($symbol);
                }
                return $this->parent->resolve($symbol);
            }
            $symbol = $alias;
        }
    }

    public function subScope(): self
    {
        $scope = new self();
        $scope->parent = $this;
        return $scope;
    }
}
