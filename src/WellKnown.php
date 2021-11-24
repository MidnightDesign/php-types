<?php

declare(strict_types=1);

namespace PhpTypes;

final class WellKnown
{
    public static function arrayKey(): TypeInterface
    {
        return UnionType::create([StringType::instance(), IntType::instance()]);
    }
}
