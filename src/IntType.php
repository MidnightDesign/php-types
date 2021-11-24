<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class IntType implements TypeInterface
{
    private static self|null $instance = null;

    /**
     * @psalm-pure
     */
    public static function instance(): self
    {
        /** @psalm-suppress ImpureStaticProperty */
        return self::$instance ??= new self();
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
