<?php

declare(strict_types=1);

namespace PhpTypes;

use Stringable;

/**
 * @psalm-immutable
 */
interface TypeInterface extends Stringable
{
    public function isSupertypeOf(TypeInterface $other): bool;
}
