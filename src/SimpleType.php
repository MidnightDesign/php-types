<?php

declare(strict_types=1);

namespace PhpTypes;

use function count;
use function implode;
use function sprintf;

final class SimpleType implements TypeInterface
{
    /** @var list<TypeInterface> */
    private array $typeArguments = [];

    private function __construct(private string $name)
    {
    }

    public static function create(string $name): TypeInterface
    {
        if ($name === 'string') {
            return StringType::instance();
        }
        if ($name === 'int') {
            return IntType::instance();
        }
        return new self($name);
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

    public static function mixed(): TypeInterface
    {
        return self::create('mixed');
    }

    public function __toString(): string
    {
        $typeArgs = '';
        if (count($this->typeArguments) !== 0) {
            $typeArgs = sprintf('<%s>', implode(', ', $this->typeArguments));
        }
        return $this->name . $typeArgs;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if ($this->name === 'mixed') {
            return true;
        }
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
