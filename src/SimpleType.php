<?php

declare(strict_types=1);

namespace PhpTypes;

use function count;
use function implode;

/**
 * @psalm-immutable
 */
final class SimpleType implements TypeInterface
{
    /** @var list<TypeInterface> */
    private array $typeArguments = [];

    private function __construct(private string $name)
    {
    }

    /**
     * @param list<TypeInterface> $typeArguments
     */
    public static function generic(string $t, array $typeArguments): self
    {
        $instance = new self($t);
        $instance->typeArguments = $typeArguments;
        return $instance;
    }

    public function __toString(): string
    {
        $typeArgs = '';
        if (count($this->typeArguments) !== 0) {
            $typeArgs = '<' . implode(', ', $this->typeArguments) . '>';
        }
        return $this->name . $typeArgs;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }
        return $this->name === $other->name;
    }

    public function isVoid(): bool
    {
        return $this->name === 'void';
    }
}
