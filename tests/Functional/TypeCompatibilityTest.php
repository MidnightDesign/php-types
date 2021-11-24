<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

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
        ['true', 'bool'],
        ['false', 'bool'],
        ['true', 'true'],
        ['false', 'false'],
        ['object', 'mixed'],
        ['object', 'object'],
        ['array', 'iterable'],
        ['Foo', 'object'],
        // Unions
        ['string', 'string|int'],
        ['int', 'string|int'],
        ['float', 'string|float|int'],
        ['int', 'string|mixed'],
        ['string|int', 'string|int|bool'],
        ['string|int', 'bool|int|string'],
        ['string', 'string|null'],
        ['null', 'string|null'],
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
        // String Literals
        ['"test"', '"test"'],
        ['\'test\'', '\'test\''],
        ['\'test\'', '"test"'],
        ['"test"', '\'test\''],
        ['"test"', 'string'],
        ['\'test\'', 'string'],
        ['\'test\'', 'mixed'],
        ['"test"', 'mixed'],
        // Int Literals
        ['0', '0'],
        ['0', 'int'],
        ['1', '1'],
        ['1', 'int'],
        ['69', '69'],
        ['69', 'int'],
        ['-1', '-1'],
        ['-1', 'int'],
        ['-69', '-69'],
        ['-69', 'int'],
        // Collections
        ['list<int>', 'list<int>'],
        ['list<string>', 'array<int, string>'],
        ['array<string>', 'iterable<string>'],
        ['array<array-key, string>', 'array<string>'],
        ['array<array-key, mixed>', 'array'],
        ['array<string, float>', 'array<float>'],
        ['iterable<string>', 'iterable<string|int>'],
        ['list<bool>', 'iterable<bool>'],
        ['array{foo: string}', 'array<string, string>'],
        ['array{foo: string, bar: string}', 'array<string, string>'],
        ['array{foo: string, bar: int}', 'array<string, string|int>'],
        ['array{"foo", "bar"}', 'list<string>'],
        ['array{string, string}', 'list<string>'],
        ['array{int, string}', 'list<string|int>'],
        ['array{string, string}', 'array<int, string>'],
        ['list<mixed>', 'list'],
        // Classes
        ['Foo', 'Foo'],
        ['Foo', 'FooInterface'],
    ];
    private const INCOMPATIBLE_TYPES = [
        // Simple
        ['string', 'int'],
        ['mixed', 'bool'],
        ['string|int', 'int'],
        ['false', 'true'],
        ['bool', 'true'],
        ['true', 'false'],
        ['bool', 'false'],
        ['mixed', 'object'],
        ['string|int', 'string'],
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
        // Literal
        ['string', '\'test\''],
        ['string', '"test"'],
        ['"foo"', '"bar"'],
        ['23', '27'],
        ['int', '27'],
        // Collections
        ['list<string>', 'array<string, string>'],
        ['iterable', 'array'],
        ['string', 'iterable'],
        ['iterable<int, string>', 'iterable<string, int>'],
        ['float', 'array'],
        ['iterable<string, float>', 'iterable<string, int>'],
        ['iterable<bool, int>', 'iterable<string, int>'],
        ['float', 'list'],
        ['int', 'string|null'],
        ['array{foo: int}', 'array<string, string>'],
        // Classes
        ['FooInterface', 'Foo'],
        ['Popo', 'FooInterface'],
        ['string', 'Foo'],
    ];

    private Scope $scope;

    /**
     * @dataProvider compatibleTypes
     */
    public function testCompatibleTypes(string $subtype, string $supertype): void
    {
        $super = $this->scope->parse($supertype);
        $sub = $this->scope->parse($subtype);
        $displaySuper = (string)$super === $supertype ? $supertype : $supertype . ' (' . $super . ')';
        $displaySub = (string)$sub === $subtype ? $subtype : $subtype . ' (' . $sub . ')';
        self::assertTrue(
            $super->isSupertypeOf($sub),
            \Safe\sprintf('Failed asserting that %s is a subtype of %s.', $displaySub, $displaySuper)
        );
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function compatibleTypes(): iterable
    {
        foreach (self::COMPATIBLE_TYPES as [$subtype, $supertype]) {
            yield \Safe\sprintf('%s is subtype of %s', $subtype, $supertype) => [$subtype, $supertype];
        }
    }

    /**
     * @dataProvider incompatibleTypes
     */
    public function testIncompatibleTypes(string $subtype, string $supertype): void
    {
        self::assertFalse(
            $this->scope->parse($supertype)->isSupertypeOf($this->scope->parse($subtype)),
            \Safe\sprintf('Expected %s to not be a subtype of %s, but it actually is.', $subtype, $supertype)
        );
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function incompatibleTypes(): iterable
    {
        foreach (self::INCOMPATIBLE_TYPES as [$subtype, $supertype]) {
            yield \Safe\sprintf('%s is subtype of %s', $subtype, $supertype) => [$subtype, $supertype];
        }
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->scope = Scope::new();
        $fooInterface = new ClassType('FooInterface');
        $this->scope->register('FooInterface', $fooInterface);
        $this->scope->register('Foo', new ClassType('Foo', [$fooInterface]));
        $this->scope->register('Popo', new ClassType('Popo'));
    }
}
