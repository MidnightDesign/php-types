<?php

declare(strict_types=1);

namespace PhpTypes;

use function array_merge;
use function array_splice;
use function count;
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
    public static function create(array $alternatives): TypeInterface
    {
        $alternatives = self::flatten($alternatives);
        $reduced = self::reduceAlternatives($alternatives);
        if (count($reduced) === 1) {
            return $reduced[0];
        }
        return new self($reduced);
    }

    /**
     * @param list<TypeInterface> $alternatives
     * @return list<TypeInterface>
     * @psalm-pure
     */
    private static function reduceAlternatives(array $alternatives): array
    {
        $i = count($alternatives) - 1;
        while (true) {
            $current = $alternatives[$i] ?? null;
            if ($current === null) {
                break;
            }
            foreach ($alternatives as $index => $other) {
                if ($index === $i || !$other->isSupertypeOf($current)) {
                    continue;
                }
                array_splice($alternatives, $i, 1);
                continue 2;
            }
            $i--;
        }
        return $alternatives;
    }

    /**
     * @param list<TypeInterface> $alternatives
     * @return list<TypeInterface>
     * @psalm-pure
     */
    private static function flatten(array $alternatives): array
    {
        $flattened = [];
        foreach ($alternatives as $alternative) {
            if ($alternative instanceof UnionType) {
                $flattened = array_merge($flattened, self::flatten($alternative->alternatives));
            } else {
                $flattened[] = $alternative;
            }
        }
        return $flattened;
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
