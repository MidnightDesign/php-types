<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;

/**
 * @psalm-immutable
 */
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
     * @psalm-pure
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

    public function allAreSubtypesOf(TypeInterface $supertype): bool
    {
        foreach ($this->alternatives as $alternative) {
            if ($supertype->isSupertypeOf($alternative)) {
                continue;
            }
            return false;
        }
        return true;
    }
}
