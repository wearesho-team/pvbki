<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Exceptions\UnsupportedMode;

/**
 * Class InvalidModeExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass \Wearesho\Pvbki\Exceptions\UnsupportedMode
 * @internal
 */
class InvalidModeExceptionTest extends TestCase
{
    public function testGetMode(): void
    {
        $mode = 5;
        $exception = new UnsupportedMode($mode);

        $this->assertEquals($mode, $exception->getMode());
    }
}
