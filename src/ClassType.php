<?php

declare(strict_types=1);

namespace PhpTypes;

use function array_map;
use function count;
use function implode;
use function in_array;

/**
 * @psalm-immutable
 */
final class ClassType implements TypeInterface
{
    /**
     * @param list<self> $parentClasses
     * @param list<TypeInterface> $typeParameters
     */
    public function __construct(
        private string $className,
        private array $parentClasses = [],
        private array $typeParameters = []
    ) {
    }

    public function __toString(): string
    {
        $typeParameters = count($this->typeParameters) ? '<' . implode(', ', $this->typeParameters) . '>' : '';
        return $this->className . $typeParameters;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }

        $otherParentClassNames = array_map(
            static fn(self $parentClass): string => $parentClass->className,
            $other->parentClasses
        );
        return in_array($this->className, $otherParentClassNames, true);
    }
}
