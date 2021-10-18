<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;

final class IntersectionType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $types
     */
    private function __construct(private array $types)
    {
    }

    /**
     * @param list<TypeInterface> $types
     */
    public static function create(array $types): self
    {
        return new self($types);
    }

    public function __toString(): string
    {
        return implode('&', $this->types);
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return false;
    }
}
