<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

use function is_int;
use function sprintf;

final class ParseAndToStringRoundtripTest extends TestCase
{
    private const CASES = [
        // Simple
        'string',
        'int',
        'float',
        'bool',
        // Unions
        'string|int',
        'string|int|float',
        'list<string>|list<int>',
        'list<string|int>',
        // Intersections
//        'FooInterface&BarInterface',
        // Generics
        'list<string>',
        'array<string, bool>',
        'array<string, array<string, int>>',
        // Callable
        'callable(): void',
        'callable(string): void',
        'callable(string): int',
        'callable(string, bool): float',
        'callable(list<int>, string, array<int, bool>): string',
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
    ];

    /**
     * @dataProvider cases
     */
    public function testRoundtrip(string $from, string $expected): void
    {
        $actual = (string)Scope::new()->parse($from);

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
            yield sprintf('%s -> %s', $from, $expected) => [$from, $expected];
        }
    }
}
