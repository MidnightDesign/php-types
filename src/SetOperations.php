<?php

namespace PhpTypes;

final class SetOperations
{
    public static function difference(TypeInterface $a, TypeInterface $b): TypeInterface
    {
        if ($a instanceof DiffableInterface) {
            return $a->difference($b);
        }
        return new DiffType($a, $b);
    }

    private function __construct()
    {
    }
}
