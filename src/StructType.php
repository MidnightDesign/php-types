<?php

declare(strict_types=1);

namespace PhpTypes;

use function implode;

class StructType implements TypeInterface
{
    /**
     * @param array<string, array{type: TypeInterface, optional: bool}> $fields
     */
    private function __construct(private array $fields)
    {
    }

    /**
     * @param array<string, array{type: TypeInterface, optional: bool}> $fields
     */
    public static function create(array $fields): self
    {
        return new self($fields);
    }

    public function __toString(): string
    {
        $entries = [];
        foreach ($this->fields as $name => $definition) {
            ['type' => $type, 'optional' => $optional] = $definition;
            $entries[] = $name . ($optional ? '?' : '') . ': ' . $type;
        }
        return 'array{' . implode(', ', $entries) . '}';
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }
        foreach ($this->fields as $key => $fieldDefinition) {
            $otherDefinition = $other->fields[$key] ?? null;
            $thisOptional = $fieldDefinition['optional'];
            if ($otherDefinition === null) {
                if ($thisOptional) {
                    continue;
                }
                return false;
            }
            if (!$fieldDefinition['type']->isSupertypeOf($otherDefinition['type'])) {
                return false;
            }
            if (!$thisOptional && $otherDefinition['optional']) {
                return false;
            }
        }
        return true;
    }
}
