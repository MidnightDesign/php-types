<?php

declare(strict_types=1);

namespace PhpTypes;

class ClassType implements TypeInterface
{
    /**
     * @param list<self> $parents
     */
    private function __construct(private string $name, private array $parents = [])
    {
    }

    /**
     * @param list<self> $parents
     */
    public static function create(string $name, array $parents = []): self
    {
        return new self($name, $parents);
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function isSupertypeOf(TypeInterface $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }
        foreach ($other->ancestors() as $ancestor) {
            if ($ancestor->name !== $this->name) {
                continue;
            }
            return true;
        }
        return false;
    }

    /**
     * @return iterable<int, self>
     */
    private function ancestors(): iterable
    {
        yield $this;
        foreach ($this->parents as $parent) {
            yield from $parent->ancestors();
        }
    }
}
