<?php

namespace Wearesho\Pvbki\Tests\Unit\Infrastructure;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Status;

/**
 * Class EnumTest
 * @package Wearesho\Pvbki\Tests\Unit\Infrastructure
 * @coversDefaultClass \Wearesho\Pvbki\Infrastructure\Enum
 * @internal
 */
class EnumTest extends TestCase
{
    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'INVALID_ENUM' in class Wearesho\Pvbki\Enums\Status
     */
    public function testBadMethodCall(): void
    {
        Status::INVALID_ENUM();
    }
}
