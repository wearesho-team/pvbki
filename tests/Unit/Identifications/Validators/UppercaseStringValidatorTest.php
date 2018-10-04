<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications\Validators;

use Wearesho\Pvbki\Identifications\Validators\UppercaseStringValidator;

use PHPUnit\Framework\TestCase;

/**
 * Class UppercaseStringValidatorTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications\Validators
 * @coversDefaultClass UppercaseStringValidator
 * @internal
 */
class UppercaseStringValidatorTest extends TestCase
{
    public function testSuccessValidate(): void
    {
        UppercaseStringValidator::validate(1, 'П', 'message');
        UppercaseStringValidator::validate(5, 'ФБВГД', 'message');
        UppercaseStringValidator::validate(3, 'САМ', 'message');

        $this->assertTrue(true);
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: String must be in 10 uppercase chars length
     */
    public function testFailValidate(): void
    {
        UppercaseStringValidator::validate(10, 'ФЫВАП', 'String must be in 10 uppercase chars length');
    }
}
