<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\Parser;
use PHPUnit\Framework\TestCase;

use function sprintf;

class TypeCompatibilityTest extends TestCase
{
    private const COMPATIBLE_TYPES = [
        // Basic types
        ['string', 'string'],
        ['int', 'int'],
        ['float', 'float'],
        ['bool', 'bool'],
        ['string', 'mixed'],
        ['int', 'mixed'],
        ['float', 'mixed'],
        ['bool', 'mixed'],
        // Unions
        ['string', 'string|int'],
        ['int', 'string|int'],
        ['float', 'string|float|int'],
        ['int', 'string|mixed'],
        ['string|int', 'string|int|bool'],
        ['string|int', 'bool|int|string'],
        // Callables
        ['callable(string): void', 'callable(string|int): void'],
        ['callable(): string', 'callable(): string|int'],
        ['callable(): string', 'callable(): void'],
        // Tuples
        ['array{string, int}', 'array{string, int}'],
        ['array{string, int}', 'array{string}'],
        ['array{string, int}', 'array{string, int|bool}'],
        // Structs
        ['array{foo: string}', 'array{foo: string}'],
        ['array{foo: string}', 'array{foo: string|int}'],
        ['array{foo: string, bar: int}', 'array{foo: string, bar: int}'],
        ['array{foo: string}', 'array{foo?: string}'],
        ['array{bar: int}', 'array{foo?: string, bar: int}'],
        ['array{foo: string, bar: int}', 'array{foo: string}'],
        ['array{foo: string, bar: int}', 'array{bar: int, foo: string}'],
        ['array{foo?: string}', 'array{foo?: string}'],
        // Special types
        ['class-string', 'string'],
        // Aliases
        ['string', 'array-key'],
        ['int', 'array-key'],
    ];
    private const INCOMPATIBLE_TYPES = [
        // Simple
        ['string', 'int'],
        ['mixed', 'bool'],
        ['string|int', 'int'],
        // Union
        ['string|int|bool', 'int|string'],
        ['string|int', 'string|float'],
        ['bool', 'string|float'],
        // Callable
        ['callable(): void', 'callable(float): void'],
        ['callable(): int', 'callable(): string'],
        ['callable(string): void', 'callable(float): void'],
        ['string', 'callable(): void'],
        // Tuple
        ['array{string}', 'array{string, float}'],
        ['array{float, float}', 'array{string|int, float}'],
        ['int', 'array{int, string}'],
        // Struct
        ['array{foo: string}', 'array{foo: int}'],
        ['array{foo: string}', 'array{foo: string, bar: int}'],
        ['array{foo?: string}', 'array{foo: string}'],
        ['bool', 'array{foo: string}'],
        ['array{bar: string}', 'array{foo?: string, bar: int}'],
        // Intersection
        ['bool', 'array{foo: string}&array{bar: int}'],
        // Special types
        ['string', 'class-string'],
        // Aliases
        ['float', 'array-key'],
        ['bool', 'array-key'],
    ];

    /**
     * @dataProvider compatibleTypes
     */
    public function testCompatibleTypes(string $subtype, string $supertype): void
    {
        self::assertTrue(
            Parser::parse($supertype)->isSupertypeOf(Parser::parse($subtype)),
            \Safe\sprintf('Failed asserting that %s is a subtype of %s.', $subtype, $supertype)
        );
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function compatibleTypes(): iterable
    {
        foreach (self::COMPATIBLE_TYPES as [$subtype, $supertype]) {
            yield sprintf('%s is subtype of %s', $subtype, $supertype) => [$subtype, $supertype];
        }
    }

    /**
     * @dataProvider incompatibleTypes
     */
    public function testIncompatibleTypes(string $subtype, string $supertype): void
    {
        self::assertFalse(
            Parser::parse($supertype)->isSupertypeOf(Parser::parse($subtype)),
            \Safe\sprintf('Expected %s to not be a subtype of %s, but it actually is.', $subtype, $supertype)
        );
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function incompatibleTypes(): iterable
    {
        foreach (self::INCOMPATIBLE_TYPES as [$subtype, $supertype]) {
            yield sprintf('%s is subtype of %s', $subtype, $supertype) => [$subtype, $supertype];
        }
    }
}
