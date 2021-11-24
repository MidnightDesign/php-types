<?php

declare(strict_types=1);

namespace PhpTypes;

interface KeyValueTypeInterface
{
    /**
     * @psalm-pure
     */
    public function getKeyType(): TypeInterface;

    /**
     * @psalm-pure
     */
    public function getValueType(): TypeInterface;
}
