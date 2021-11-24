<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\Exception\ParseError;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

final class ParseErrorsTest extends TestCase
{
    /**
     * @dataProvider errorCases
     */
    public function testErrors(string $typeString, string $expectedMessage): void
    {
        $this->expectExceptionObject(new ParseError($expectedMessage));

        Scope::new()->parse($typeString);
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public function errorCases(): iterable
    {
        yield 'List with two type parameters' => [
            'list<int, string>',
            'Lists take zero or one type parameter, 2 given',
        ];
        yield 'Array with three type parameters' => [
            'array<int, string, int>',
            'Arrays take 0 (array-key, mixed), 1 (array-key, V) or 2 (K, V) type parameters, 3 given.',
        ];
        yield 'Unknown type' => [
            'strring',
            'Unknown type: strring',
        ];
        yield 'Void in parameter position' => [
            'callable(void): void',
            'Can\'t use void as a parameter type',
        ];
    }
}
