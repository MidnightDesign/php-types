<?php

declare(strict_types=1);

namespace PhpTypes;

final class SetOperations
{
    /**
     * @psalm-pure
     */
    public static function difference(TypeInterface $a, TypeInterface $b): TypeInterface
    {
        if ($a instanceof DiffableInterface) {
            $diff = $a->difference($b);
            if ($diff !== null) {
                return $diff;
            }
        }
        return new DiffType($a, $b);
    }

    private function __construct()
    {
    }
}
