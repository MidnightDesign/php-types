<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

use function count;

final class ParseAndToStringRoundtripTest extends TestCase
{
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
        foreach (TestCaseLoader::loadTypes(__DIR__ . '/ParseAndToString.md', ' -> ') as $section => $types) {
            [$from, $expected] = count($types) === 1 ? [$types[0], $types[0]] : $types;
            yield $section . ': ' . $from . ' -> ' . $expected => [$from, $expected];
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
