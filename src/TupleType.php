<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;
use function sprintf;

/**
 * @psalm-immutable
 */
class TupleType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $items
     */
    public function __construct(private array $items)
    {
    }

    public function __toString(): string
    {
        return sprintf('array{%s}', implode(', ', $this->items));
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }
        foreach ($this->items as $index => $item) {
            $otherItem = $other->items[$index] ?? null;
            if ($otherItem === null) {
                return false;
            }
            if ($item->isSupertypeOf($otherItem)) {
                continue;
            }
            return false;
        }
        return true;
    }
}
