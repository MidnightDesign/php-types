<?php

declare(strict_types=1);

namespace PhpTypes;

interface GenericTypeInterface extends TypeInterface
{
    /**
     * @param list<TypeInterface> $typeParameters
     */
    public static function withTypeParameters(array $typeParameters): static;
}
