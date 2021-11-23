<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;
use function sprintf;

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
        $this->returnType = $returnType ?? MixedType::instance();
    }

    public function __toString(): string
    {
        return sprintf('callable(%s): %s', implode(', ', $this->arguments), (string)$this->returnType);
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
        if ($this->returnType instanceof VoidType) {
            return true;
        }
        $thisReturnType = $this->returnType;
        $otherReturnType = $other->returnType;
        return $thisReturnType->isSupertypeOf($otherReturnType);
    }
}
