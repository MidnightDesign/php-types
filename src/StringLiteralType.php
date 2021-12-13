<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class StringLiteralType implements TypeInterface
{
    public function __construct(private string $text)
    {
    }

    public function __toString(): string
    {
        return '\'' . $this->text . '\'';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        return $other instanceof self && $other->text === $this->text;
    }

    public function toStringType(): StringType
    {
        return $this->text === '' ? StringType::instance() : StringType::nonEmpty();
    }
}
