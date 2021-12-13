<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
final class StringType implements TypeInterface
{
    private static self|null $instance = null;
    private static self|null $nonEmpty = null;

    public function __construct(private bool $canBeEmpty = true)
    {
    }

    /**
     * @psalm-pure
     */
    public static function instance(): self
    {
        /** @psalm-suppress ImpureStaticProperty */
        return self::$instance ??= new self(true);
    }

    /**
     * @psalm-pure
     */
    public static function nonEmpty(): self
    {
        /** @psalm-suppress ImpureStaticProperty */
        return self::$nonEmpty ??= new self(false);
    }

    public function __toString(): string
    {
        return 'string';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if ($other instanceof UnionType && $other->allAreSubtypesOf($this)) {
            return true;
        }
        if ($other instanceof StringLiteralType) {
            $other = $other->toStringType();
        }
        if ($other instanceof self) {
            if ($this->canBeEmpty) {
                return true;
            }
            return !$other->canBeEmpty;
        }
        return false;
    }
}
