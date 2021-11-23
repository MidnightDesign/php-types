<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class IntLiteralType implements TypeInterface
{
    public function __construct(private int $int)
    {
    }

    public function __toString(): string
    {
        return (string)$this->int;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $other instanceof self && $other->int === $this->int;
    }
}
