<?php

declare(strict_types=1);

namespace PhpTypes\Exception;

use LogicException;

use function sprintf;

final class UnknownSymbolException extends LogicException
{
    public static function fromSymbol(string $symbol): self
    {
        return new self(sprintf('Unknown symbol "%s".', $symbol));
    }
}
