<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use PhpTypes\BoolType;
use PhpTypes\BoolValueType;
use PhpTypes\FloatType;
use PhpTypes\IntType;
use PhpTypes\MixedType;
use PhpTypes\NullType;
use PhpTypes\ObjectType;
use PhpTypes\StringType;
use PhpTypes\TypeInterface;
use PhpTypes\VoidType;
use PHPUnit\Framework\TestCase;

final class SingletonTypesTest extends TestCase
{
    /**
     * @param callable(): TypeInterface $getInstance
     * @dataProvider instances
     */
    public function testThereIsOnlyOneInstance(callable $getInstance): void
    {
        self::assertSame($getInstance(), $getInstance());
    }

    /**
     * @return iterable<string, array{callable(): TypeInterface}>
     */
    public function instances(): iterable
    {
        yield 'BoolType::instance' => [static fn(): TypeInterface => BoolType::instance()];
        yield 'BoolValueType::true' => [static fn(): TypeInterface => BoolValueType::true()];
        yield 'BoolValueType::false' => [static fn(): TypeInterface => BoolValueType::false()];
        yield 'FloatType::instance' => [static fn(): TypeInterface => FloatType::instance()];
        yield 'IntType::instance' => [static fn(): TypeInterface => IntType::instance()];
        yield 'MixedType::instance' => [static fn(): TypeInterface => MixedType::instance()];
        yield 'NullType::instance' => [static fn(): TypeInterface => NullType::instance()];
        yield 'ObjectType::instance' => [static fn(): TypeInterface => ObjectType::instance()];
        yield 'StringType::instance' => [static fn(): TypeInterface => StringType::instance()];
        yield 'VoidType::instance' => [static fn(): TypeInterface => VoidType::instance()];
    }
}
