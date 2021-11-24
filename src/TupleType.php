<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;

/**
 * @psalm-immutable
 */
class TupleType implements TypeInterface, KeyValueTypeInterface
{
    /**
     * @param list<TypeInterface> $items
     */
    public function __construct(private array $items)
    {
    }

    public function __toString(): string
    {
        return 'array{' . implode(', ', $this->items) . '}';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }
        foreach ($this->items as $index => $item) {
            $otherItems = $other->items;
            $otherItem = $otherItems[$index] ?? null;
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

    public function getKeyType(): TypeInterface
    {
        return IntType::instance();
    }

    public function getValueType(): TypeInterface
    {
        return UnionType::create($this->items);
    }
}
