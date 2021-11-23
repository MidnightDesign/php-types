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
    /**
     * @param list<TypeInterface> $arguments
     */
    public function __construct(private array $arguments, private ?TypeInterface $returnType = null)
    {
    }

    public function __toString(): string
    {
        if ($this->returnType === null) {
            return sprintf('callable(%s)', implode(', ', $this->arguments));
        }
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
        if ($this->returnType instanceof SimpleType && $this->returnType->isVoid()) {
            return true;
        }
        $thisReturnType = $this->returnType ?? MixedType::instance();
        $otherReturnType = $other->returnType ?? MixedType::instance();
        return $thisReturnType->isSupertypeOf($otherReturnType);
    }
}
