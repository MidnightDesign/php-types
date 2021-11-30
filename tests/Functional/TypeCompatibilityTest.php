<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

class TypeCompatibilityTest extends TestCase
{
    private Scope $scope;

    /**
     * @dataProvider compatibleTypes
     */
    public function testCompatibleTypes(string $supertype, string $subtype): void
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
        foreach (TestCaseLoader::loadTypes(__DIR__ . '/CompatibleTypes.md', ' accepts ') as $section => $types) {
            yield $section . ': ' . $types[0] . ' accepts ' . $types[1] => [$types[0], $types[1]];
        }
    }

    /**
     * @dataProvider incompatibleTypes
     */
    public function testIncompatibleTypes(string $supertype, string $subtype): void
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
        $cases = TestCaseLoader::loadTypes(__DIR__ . '/IncompatibleTypes.md', ' doesn\'t accept ');
        foreach ($cases as $section => $types) {
            yield $section . ': ' . $types[0] . ' accepts ' . $types[1] => [$types[0], $types[1]];
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
