<?php

declare(strict_types=1);

namespace PhpTypes\Test\Unit;

use PhpTypes\ClassType;
use PhpTypes\SimpleType;
use PhpTypes\TypeInterface;
use PHPUnit\Framework\TestCase;

final class ClassTypeTest extends TestCase
{
    /**
     * @dataProvider compatibleClassesCases
     */
    public function testCompatibleClasses(TypeInterface $subtype, ClassType $supertype): void
    {
        self::assertTrue($supertype->isSupertypeOf($subtype));
    }

    /**
     * @return iterable<string, array{TypeInterface, ClassType}>
     */
    public function compatibleClassesCases(): iterable
    {
        yield 'Same class' => [
            ClassType::create('Foo'),
            ClassType::create('Foo'),
        ];
        $fooInterface = ClassType::create('FooInterface');
        yield 'Interface and implementation' => [
            ClassType::create('Foo', [$fooInterface]),
            $fooInterface,
        ];
        $baseInterface = ClassType::create('BaseInterface');
        $specialInterface = ClassType::create('SpecialInterface', [$baseInterface]);
        yield 'Interface -> Interface -> Implementation' => [
            ClassType::create('Foo', [$specialInterface]),
            $baseInterface,
        ];
        $interfaceA = ClassType::create('InterfaceA');
        $interfaceB = ClassType::create('InterfaceB');
        $implementsMultiple = ClassType::create('Foo', [$interfaceA, $interfaceB]);
        yield 'Multiple interfaces, A' => [$implementsMultiple, $interfaceA];
        yield 'Multiple interfaces, B' => [$implementsMultiple, $interfaceB];
    }

    /**
     * @dataProvider incompatibleClassesCases
     */
    public function testIncompatibleClasses(TypeInterface $subtype, ClassType $supertype): void
    {
        self::assertFalse($supertype->isSupertypeOf($subtype));
    }

    /**
     * @return iterable<string, array{TypeInterface, ClassType}>
     */
    public function incompatibleClassesCases(): iterable
    {
        $fooInterface = ClassType::create('FooInterface');
        yield 'Implementation and interface' => [
            $fooInterface,
            ClassType::create('Foo', [$fooInterface]),
        ];
        yield 'Unrelated' => [
            ClassType::create('Foo'),
            ClassType::create('Bar'),
        ];
        $myInterface = ClassType::create('MyInterface');
        yield 'Extending the same interface' => [
            ClassType::create('Foo', [$myInterface]),
            ClassType::create('Bar', [$myInterface]),
        ];
        yield 'Not a class' => [
            SimpleType::create('string'),
            ClassType::create('Foo'),
        ];
    }

    /**
     * @dataProvider toStringCases
     */
    public function testToString(ClassType $type, string $expectedStringRepresentation): void
    {
        self::assertSame($expectedStringRepresentation, (string)$type);
    }

    /**
     * @return iterable<string, array{ClassType, string}>
     */
    public function toStringCases(): iterable
    {
        yield 'Simple class' => [ClassType::create('Foo'), 'Foo'];
    }
}
