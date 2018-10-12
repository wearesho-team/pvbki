<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Exceptions\SoapException;

/**
 * Class SoapExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass SoapException
 * @internal
 */
class SoapExceptionTest extends TestCase
{
    protected const TYPE = 'type';
    protected const MESSAGE = 'message';
    protected const CODE= 5;

    /** @var SoapException */
    protected $fakeSoapException;

    protected function setUp(): void
    {
        $this->fakeSoapException = new SoapException(
            static::TYPE,
            static::MESSAGE,
            static::CODE
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeSoapException->getType()
        );
    }
}
