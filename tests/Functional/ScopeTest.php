<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

final class ScopeTest extends TestCase
{
    public function testParsingATypeContainingAnAlias(): void
    {
        $scope = Scope::new();
        $scope->register('MyCustomType', $scope->parse('array{foo: string}'));

        $type = $scope->parse('array{myCust: MyCustomType}');

        self::assertSame('array{myCust: array{foo: string}}', (string)$type);
    }

    public function testAliasingAnAlias(): void
    {
        $scope = Scope::new();
        $scope->register('Foo', $scope->parse('int'));
        $scope->register('Bar', $scope->parse('Foo'));

        $type = $scope->parse('Bar');

        self::assertSame('int', (string)$type);
    }
}
