<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use Wearesho\Pvbki\Exceptions\IdentificationDataValidation;

use PHPUnit\Framework\TestCase;

/**
 * Class IdentificationDataValidationTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass IdentificationDataValidation
 * @internal
 */
class IdentificationDataValidationTest extends TestCase
{
    public function testGetData(): void
    {
        $data = 'some data';
        $exception = new IdentificationDataValidation($data);

        $this->assertEquals($data, $exception->getData());
    }
}
