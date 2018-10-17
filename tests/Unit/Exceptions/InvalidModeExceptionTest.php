<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Exceptions\InvalidModeException;

/**
 * Class InvalidModeExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass \Wearesho\Pvbki\Exceptions\InvalidModeException
 * @internal
 */
class InvalidModeExceptionTest extends TestCase
{
    protected const MODE = 5;

    /** @var InvalidModeException */
    protected $fakeInvalidModeException;

    protected function setUp(): void
    {
        $this->fakeInvalidModeException = new InvalidModeException(static::MODE);
    }

    public function testGetMode(): void
    {
        $this->assertEquals(static::MODE, $this->fakeInvalidModeException->getMode());
    }
}
