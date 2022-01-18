<?php

namespace PhpTypes;

final class DiffType implements TypeInterface, GenericTypeInterface
{
    public function __construct(private TypeInterface $a, private TypeInterface $b)
    {
    }

    public function __toString()
    {
        return 'diff<' . $this->a . ', ' . $this->b . '>';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $this->a->isSupertypeOf($other) && !$this->b->isSupertypeOf($other);
    }

    public static function withTypeParameters(array $typeParameters): static
    {
        return new self($typeParameters[0], $typeParameters[1]);
    }
}
