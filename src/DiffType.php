<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class DiffType implements TypeInterface, GenericTypeInterface
{
    public function __construct(private TypeInterface $a, private TypeInterface $b)
    {
    }

    public function __toString(): string
    {
        return 'diff<' . $this->a . ', ' . $this->b . '>';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $this->a->isSupertypeOf($other) && !$this->b->isSupertypeOf($other);
    }

    /**
     * @param list<TypeInterface> $typeParameters
     */
    public static function withTypeParameters(array $typeParameters): static
    {
        return new self($typeParameters[0], $typeParameters[1]);
    }
}
