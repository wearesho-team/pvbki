<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use Wearesho\Pvbki\Exceptions\InvalidModeException;

use PHPUnit\Framework\TestCase;

/**
 * Class InvalidModeExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass InvalidModeException
 * @internal
 */
class InvalidModeExceptionTest extends TestCase
{
    protected const MODE = 10;

    /** @var InvalidModeException */
    protected $fakeInvalidModeException;

    protected function setUp(): void
    {
        $this->fakeInvalidModeException = new InvalidModeException(static::MODE);
    }

    public function testGetMode(): void
    {
        $this->assertEquals(
            static::MODE,
            $this->fakeInvalidModeException->getMode()
        );
    }
}
