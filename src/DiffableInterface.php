<?php

namespace PhpTypes;

interface DiffableInterface
{
    public function difference(TypeInterface $other): ?TypeInterface;
}
