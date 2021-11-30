<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

use function explode;
use function fgets;
use function str_starts_with;
use function trim;

class TypeCompatibilityTest extends TestCase
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

    /**
     * @param non-empty-string $separator
     * @return iterable<string, array{string, string}>
     */
    private static function readCases(string $file, string $separator): iterable
    {
        $section = '';
        foreach (self::lines($file) as $line) {
            if (self::shouldBeIgnored($line)) {
                continue;
            }
            if (self::isSectionTitle($line)) {
                $section = \Safe\substr($line, 2);
                continue;
            }
            [$supertype, $subtype] = explode($separator, \Safe\substr($line, 2));
            $supertype = trim($supertype, '`');
            $subtype = trim($subtype, '`');
            yield $section . ': ' . $supertype . $separator . $subtype => [$subtype, $supertype];
        }
    }

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
        return self::readCases(__DIR__ . '/CompatibleTypes.md', ' accepts ');
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
        return self::readCases(__DIR__ . '/IncompatibleTypes.md', ' doesn\'t accept ');
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
