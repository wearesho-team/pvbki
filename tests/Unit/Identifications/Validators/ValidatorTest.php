<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications\Validators;

use Wearesho\Pvbki\Identifications\Validators\Validator;

use PHPUnit\Framework\TestCase;

/**
 * Class ValidatorTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications\Validators
 * @coversDefaultClass Validator
 * @internal
 */
class ValidatorTest extends TestCase
{
    /** @var Validator */
    protected $fakeValidator;

    protected function setUp(): void
    {
        $this->fakeValidator = new class extends Validator
        {
            protected static function pattern(int $injected = null): string
            {
                return "/^value:{$injected}$/u";
            }
        };
    }

    public function testSuccessValidate(): void
    {
        $this->fakeValidator::validate(2, 'value:2', 'message');
        $this->fakeValidator::validate(5, 'value:5', 'message');
        $this->fakeValidator::validate(10, 'value:10', 'message');

        $this->assertTrue(true);
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage  Value not same as expected
     */
    public function testFailValidate(): void
    {
        $this->fakeValidator::validate(5, 'value:1', 'Value not same as expected');
    }
}
