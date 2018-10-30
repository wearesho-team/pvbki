<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class IdentificationDataValidationTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass \Wearesho\Pvbki\Exceptions\IdentificationDataValidation
 * @internal
 */
class IdentificationDataValidationTest extends TestCase
{
    public function testException(): void
    {
        $data = 'some data';
        $exception = new Pvbki\Exceptions\IdentificationDataValidation($data);

        $this->assertEquals($data, $exception->getData());
        $this->assertInstanceOf(Pvbki\Exception::class, $exception);
    }
}
