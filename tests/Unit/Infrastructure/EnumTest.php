<?php

namespace Wearesho\Pvbki\Tests\Unit\Infrastructure;

use Wearesho\Pvbki\Infrastructure\Enum;

use PHPUnit\Framework\TestCase;

/**
 * Class EnumTest
 * @package Wearesho\Pvbki\Tests\Unit\Infrastructure
 * @coversDefaultClass Enum
 * @internal
 */
class EnumTest extends TestCase
{
    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'INVALID_CONST' in class
     *     Wearesho\Pvbki\Infrastructure\Enum
     */
    public function testBadMethodCall(): void
    {
        Enum::INVALID_CONST();
    }
}
