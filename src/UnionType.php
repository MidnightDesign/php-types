<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;

final class UnionType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $alternatives
     */
    private function __construct(private array $alternatives)
    {
    }

    /**
     * @param list<TypeInterface> $alternatives
     */
    public static function create(array $alternatives): self
    {
        return new self($alternatives);
    }

    public function __toString(): string
    {
        return implode('|', $this->alternatives);
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if ($other instanceof self) {
            foreach ($other->alternatives as $otherAlternative) {
                foreach ($this->alternatives as $thisAlternative) {
                    if (!$thisAlternative->isSupertypeOf($otherAlternative)) {
                        continue;
                    }
                    continue 2;
                }
                return false;
            }
            return true;
        }
        foreach ($this->alternatives as $alternative) {
            if (!$alternative->isSupertypeOf($other)) {
                continue;
            }
            return true;
        }
        return false;
    }
}
