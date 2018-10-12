<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use Wearesho\Pvbki\Exceptions\InvalidXmlFormatException;

use PHPUnit\Framework\TestCase;

/**
 * Class InvalidXmlFormatExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass InvalidXmlFormatException
 * @internal
 */
class InvalidXmlFormatExceptionTest extends TestCase
{
    protected const XML = 'xml';

    /** @var InvalidXmlFormatException */
    protected $fakeInvalidXmlFormatException;

    protected function setUp(): void
    {
        $this->fakeInvalidXmlFormatException = new InvalidXmlFormatException(static::XML);
    }

    public function testGetXml(): void
    {
        $this->assertEquals(static::XML, $this->fakeInvalidXmlFormatException->getXml());
    }
}
