<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class InvalidModeExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass \Wearesho\Pvbki\Exceptions\UnsupportedMode
 * @internal
 */
class InvalidModeExceptionTest extends TestCase
{
    public function testException(): void
    {
        $mode = 5;
        $exception = new Pvbki\Exceptions\UnsupportedMode($mode);

        $this->assertEquals($mode, $exception->getMode());
        $this->assertInstanceOf(Pvbki\Exception::class, $exception);
    }
}
