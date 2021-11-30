<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

use function is_int;

final class ParseAndToStringRoundtripTest extends TestCase
{
    private const CASES = [
        // Simple
        'string',
        'int',
        'float',
        'bool',
        'true',
        'false',
        '(int)' => 'int',
        '((int))' => 'int',
        // Unions
        'string|int',
        'string|int|float',
        'list<string>|list<int>',
        'list<string|int>',
        // Intersections
        'Foo&Bar',
        // Generics
        'list<string>',
        'array<string, bool>',
        'array<string, array<string, int>>',
        // Callable
        'callable' => 'callable(): mixed',
        'callable(): void',
        'callable(string): void',
        'callable(string): int',
        'callable(string, bool): float',
        'callable(list<int>, string, array<int, bool>): string',
        'callable(): (string|int)',
        'callable(): (array{foo: string}&array{bar: int})',
        // Tuples
        'array{string, int}',
        'array{array{int, bool}, int}',
        // Structs
        'array{foo: string}',
        'array{foo: string, bar: int}',
        'array{optional?: float}',
        // Literals
        '\'test\'',
        '"test"' => '\'test\'',
        '0',
        '1',
        '69',
        '-1',
        '-23',
        '99999999',
        // Aliases
        'array-key' => 'string|int',
        // Collections
        'array' => 'array<string|int, mixed>',
        'array<bool>' => 'array<string|int, bool>',
        'array<string, int>' => 'array<string, int>',
        'list' => 'list<mixed>',
        'list<float>' => 'list<float>',
        'iterable' => 'iterable<mixed, mixed>',
        'iterable<string>' => 'iterable<mixed, string>',
        'iterable<string, int>' => 'iterable<string, int>',
        'Foo',
    ];
    private Scope $scope;

    /**
     * @dataProvider cases
     */
    public function testRoundtrip(string $from, string $expected): void
    {
        $actual = (string)$this->scope->parse($from);

        self::assertSame($expected, $actual);
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function cases(): iterable
    {
        foreach (self::CASES as $from => $expected) {
            if (is_int($from)) {
                $from = $expected;
            }
            yield \Safe\sprintf('%s -> %s', $from, $expected) => [$from, $expected];
        }
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->scope = Scope::new();
        $this->scope->register('Foo', new ClassType('Foo'));
        $this->scope->register('Bar', new ClassType('Bar'));
    }
}
