<?php

declare(strict_types=1);

namespace PhpTypes;

/**
 * @psalm-immutable
 */
interface TypeInterface
{
    public function __toString(): string;

    public function isSupertypeOf(TypeInterface $other): bool;
}
