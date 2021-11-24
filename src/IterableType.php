<?php

declare(strict_types=1);

namespace PhpTypes;

use InvalidArgumentException;

use function count;

/**
 * @psalm-immutable
 */
final class IterableType implements GenericTypeInterface, KeyValueTypeInterface
{
    /**
     * @param list<TypeInterface> $typeParameters
     */
    public static function withTypeParameters(array $typeParameters): static
    {
        $numberOfParameters = count($typeParameters);
        return match ($numberOfParameters) {
            0 => new self(MixedType::instance(), MixedType::instance()),
            1 => new self(MixedType::instance(), $typeParameters[0]),
            2 => new self($typeParameters[0], $typeParameters[1]),
            default => throw new InvalidArgumentException(
                \Safe\sprintf(
                    'Iterables take 0 (mixed, mixed), 1 (mixed, V) or 2 (K, V) type parameters, %d given.',
                    $numberOfParameters
                )
            ),
        };
    }

    public function __construct(private TypeInterface $keyType, private TypeInterface $valueType)
    {
    }

    public function __toString(): string
    {
        return 'iterable<' . $this->keyType . ', ' . $this->valueType . '>';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof KeyValueTypeInterface) {
            return false;
        }
        return $this->keyType->isSupertypeOf($other->getKeyType())
            && $this->valueType->isSupertypeOf($other->getValueType());
    }

    public function getKeyType(): TypeInterface
    {
        return $this->keyType;
    }

    public function getValueType(): TypeInterface
    {
        return $this->valueType;
    }
}
