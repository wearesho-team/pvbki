<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Exceptions\IdentificationValidationException;

/**
 * Class IdentificationValidationExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass IdentificationValidationException
 * @internal
 */
class IdentificationValidationExceptionTest extends TestCase
{
    protected const ARGUMENT = 'argument';

    /** @var IdentificationValidationException */
    protected $fakeIdentificationValidationException;

    protected function setUp(): void
    {
        $this->fakeIdentificationValidationException = new IdentificationValidationException(static::ARGUMENT);
    }

    public function testGetIdentificationArgument(): void
    {
        $this->assertEquals(
            static::ARGUMENT,
            $this->fakeIdentificationValidationException->getIdentificationArgument()
        );
    }
}
