<?php

declare(strict_types=1);

namespace PhpTypes;

interface DiffableInterface
{
    /**
     * @psalm-pure
     */
    public function difference(TypeInterface $other): ?TypeInterface;
}
