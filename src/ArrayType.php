<?php

declare(strict_types=1);

namespace PhpTypes;

use InvalidArgumentException;

use function count;

/**
 * @psalm-immutable
 */
final class ArrayType implements GenericTypeInterface, KeyValueTypeInterface
{
    public function __construct(private TypeInterface $keyType, private TypeInterface $valueType)
    {
    }

    /**
     * @param list<TypeInterface> $typeParameters
     */
    public static function withTypeParameters(array $typeParameters): static
    {
        $numberOfParameters = count($typeParameters);
        return match ($numberOfParameters) {
            0 => new self(WellKnown::arrayKey(), MixedType::instance()),
            1 => new self(WellKnown::arrayKey(), $typeParameters[0]),
            2 => new self($typeParameters[0], $typeParameters[1]),
            default => throw new InvalidArgumentException(
                \Safe\sprintf(
                    'Arrays take 0 (array-key, mixed), 1 (array-key, V) or 2 (K, V) type parameters, %d given.',
                    $numberOfParameters
                )
            ),
        };
    }

    public function __toString(): string
    {
        return 'array<' . $this->keyType . ', ' . $this->valueType . '>';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (
            $other instanceof self ||
            $other instanceof ListType ||
            $other instanceof StructType ||
            $other instanceof TupleType
        ) {
            return $this->keyType->isSupertypeOf($other->getKeyType())
                && $this->valueType->isSupertypeOf($other->getValueType());
        }
        return false;
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
