<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications\Validators;

use Wearesho\Pvbki\Identifications\Validators\NumberValidator;

use PHPUnit\Framework\TestCase;

/**
 * Class NumberValidatorTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications\Validators
 * @coversDefaultClass NumberValidator
 * @internal
 */
class NumberValidatorTest extends TestCase
{
    public function testSuccessValidate(): void
    {
        NumberValidator::validate(5, '12345', 'message');
        NumberValidator::validate(3, '321', 'message');
        NumberValidator::validate(1, '1', 'message');

        $this->assertTrue(true);
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: Number must be in 10 digits length
     */
    public function testFailValidate(): void
    {
        NumberValidator::validate(10, '123456789', 'Number must be in 10 digits length');
    }
}
