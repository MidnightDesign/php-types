<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class BoolValueType implements TypeInterface
{
    private static ?self $true = null;
    private static ?self $false = null;

    private function __construct(private bool $value)
    {
    }

    public static function true(): self
    {
        return self::$true ??= new self(true);
    }

    public static function false(): self
    {
        return self::$false ??= new self(false);
    }

    public function __toString(): string
    {
        return $this->value ? 'true' : 'false';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $other instanceof self && $this->value === $other->value;
    }
}
