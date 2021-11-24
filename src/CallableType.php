<?php

declare(strict_types=1);

namespace PhpTypes;

use InvalidArgumentException;

use function implode;

/**
 * @psalm-immutable
 */
class CallableType implements TypeInterface
{
    private TypeInterface $returnType;

    /**
     * @param list<TypeInterface> $arguments
     */
    public function __construct(private array $arguments, ?TypeInterface $returnType = null)
    {
        foreach ($this->arguments as $argument) {
            if (!$argument instanceof VoidType) {
                continue;
            }
            throw new InvalidArgumentException('Can\'t use void as a parameter type');
        }
        $this->returnType = $returnType ?? MixedType::instance();
    }

    public function __toString(): string
    {
        return 'callable(' . implode(', ', $this->arguments) . '): ' . $this->returnType;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof CallableType) {
            return false;
        }
        foreach ($this->arguments as $index => $argument) {
            $otherArgument = $other->arguments[$index] ?? null;
            if ($otherArgument === null) {
                return false;
            }
            if (!$argument->isSupertypeOf($otherArgument)) {
                return false;
            }
        }
        $thisReturnType = $this->returnType;
        $otherReturnType = $other->returnType;
        return $thisReturnType->isSupertypeOf($otherReturnType);
    }
}
