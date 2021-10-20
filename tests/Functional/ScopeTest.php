<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\ClassType;
use PhpTypes\Exception\UnknownSymbolException;
use PhpTypes\Scope;
use PHPUnit\Framework\TestCase;

final class ScopeTest extends TestCase
{
    /**
     * @param callable(): Scope $createScope
     * @dataProvider compatibleTypesCases
     */
    public function testCompatibleTypes(callable $createScope, string $subtype, string $supertype): void
    {
        $scope = $createScope();

        self::assertTrue($scope->isSubtype($subtype, $supertype));
    }

    /**
     * @return iterable<string, array{callable(): Scope, string, string}>
     */
    public function compatibleTypesCases(): iterable
    {
        yield 'Aliased implementation of aliased interface' => [
            static function (): Scope {
                $scope = Scope::create();
                $interface = ClassType::create('My\\FooInterface');
                $scope->addClass(ClassType::create('My\\Foo', [$interface]));
                $scope->addClass($interface);
                $scope->addAlias('Foo', 'My\\Foo');
                $scope->addAlias('FooInterface', 'My\\FooInterface');
                return $scope;
            },
            'Foo',
            'FooInterface',
        ];
        yield 'Aliased implementation of aliased interface as type argument' => [
            static function (): Scope {
                $scope = Scope::create();
                $interface = ClassType::create('My\\FooInterface');
                $scope->addClass(ClassType::create('My\\Foo', [$interface]));
                $scope->addClass($interface);
                $scope->addClass(ClassType::create('Generic'));
                $scope->addAlias('Foo', 'My\\Foo');
                $scope->addAlias('FooInterface', 'My\\FooInterface');
                return $scope;
            },
            'Generic<Foo>',
            'Generic<FooInterface>',
        ];
    }

    public function testSubScopeCanResolveSymbolsFromParentScope(): void
    {
        $global = Scope::create();
        $classType = ClassType::create('Foo');
        $global->addClass($classType);
        $local = $global->subScope();

        $type = $local->resolve('Foo');

        self::assertInstanceOf(ClassType::class, $type);
        self::assertTrue($type->isSupertypeOf($classType));
    }

    public function testResolveThrowsUnknownSymbolException(): void
    {
        $scope = Scope::create();

        $this->expectException(UnknownSymbolException::class);

        $scope->resolve('Foo');
    }
}
