<?php

declare(strict_types=1);

namespace PhpTypes;

use InvalidArgumentException;

use function count;

/**
 * @psalm-immutable
 */
final class ListType implements GenericTypeInterface, KeyValueTypeInterface
{
    public function __construct(private TypeInterface $valueType)
    {
    }

    /**
     * @param list<TypeInterface> $typeParameters
     */
    public static function withTypeParameters(array $typeParameters): static
    {
        $numberOfTypeParameters = count($typeParameters);
        return match ($numberOfTypeParameters) {
            0 => new self(MixedType::instance()),
            1 => new self($typeParameters[0]),
            default => throw new InvalidArgumentException(
                \Safe\sprintf('Lists take zero or one type parameter, %d given', $numberOfTypeParameters)
            ),
        };
    }

    public function __toString(): string
    {
        return 'list<' . $this->valueType . '>';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if ($other instanceof TupleType) {
            return $this->valueType->isSupertypeOf($other->getValueType());
        }
        return $other instanceof self && $this->valueType->isSupertypeOf($other->valueType);
    }

    public function getKeyType(): TypeInterface
    {
        return IntType::instance();
    }

    public function getValueType(): TypeInterface
    {
        return $this->valueType;
    }
}
