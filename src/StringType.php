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

    private bool $canBeEmpty = true;

    /**
     * @psalm-mutation-free
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @psalm-mutation-free
     */
    public static function nonEmpty(): self
    {
        if (self::$nonEmpty === null) {
            self::$nonEmpty = new self();
            self::$nonEmpty->canBeEmpty = false;
        }
        return self::$nonEmpty;
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
