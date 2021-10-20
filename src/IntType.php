<?php

declare(strict_types=1);

namespace PhpTypes;

final class IntType implements TypeInterface
{
    private static self|null $instance = null;

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __toString(): string
    {
        return 'int';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $other instanceof self || $other instanceof IntLiteralType;
    }
}
