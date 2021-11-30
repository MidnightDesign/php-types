<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;
use RuntimeException;

use function explode;
use function fgets;
use function str_starts_with;
use function trim;

final class ParseAndToStringRoundtripTest extends TestCase
{
    private Scope $scope;

    /**
     * @return iterable<int, string>
     */
    private static function lines(string $file): iterable
    {
        $handle = \Safe\fopen($file, 'r');
        while (true) {
            $line = fgets($handle);
            if ($line === false) {
                break;
            }

            yield trim($line);
        }
        \Safe\fclose($handle);
    }

    private static function shouldBeIgnored(string $line): bool
    {
        return $line === '' || str_starts_with($line, '>');
    }

    private static function isSectionTitle(string $line): bool
    {
        return str_starts_with($line, '# ');
    }

    private static function isTestCase(string $line): bool
    {
        return str_starts_with($line, '- ');
    }

    /**
     * @return array{string, string}
     */
    private static function parseTestCase(string $line): array
    {
        $parts = explode(' -> ', \Safe\substr($line, 2));
        $from = $parts[0];
        $expected = $parts[1] ?? $from;
        return [$from, $expected];
    }

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
        $section = '';
        foreach (self::lines(__DIR__ . '/ParseAndToString.md') as $line) {
            if (self::shouldBeIgnored($line)) {
                continue;
            }

            if (self::isSectionTitle($line)) {
                $section = \Safe\substr($line, 2);
                continue;
            }

            if (!self::isTestCase($line)) {
                throw new RuntimeException('Unexpected line: ' . $line);
            }

            [$from, $expected] = self::parseTestCase($line);
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
