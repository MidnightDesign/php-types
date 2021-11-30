<?php

declare(strict_types=1);

namespace PhpTypes\Test\Functional;

use function array_map;
use function explode;
use function fgets;
use function str_starts_with;
use function trim;

final class TestCaseLoader
{
    /**
     * @param non-empty-string $separator
     * @return iterable<string, list<string>>
     */
    public static function loadTypes(string $file, string $separator): iterable
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
            $types = explode($separator, \Safe\substr($line, 2));
            yield $section => array_map(static fn(string $type): string => trim($type, '`'), $types);
        }
    }

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
}
