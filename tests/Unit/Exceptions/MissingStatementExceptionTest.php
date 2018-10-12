<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use Wearesho\Pvbki\Exceptions\MissingStatementException;

use PHPUnit\Framework\TestCase;

/**
 * Class MissingStatementExceptionTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass MissingStatementException
 * @internal
 */
class MissingStatementExceptionTest extends TestCase
{
    /** @var MissingStatementException */
    protected $fakeMissingStatementException;

    protected function setUp(): void
    {
        $this->fakeMissingStatementException = new MissingStatementException();
    }

    public function testMessage(): void
    {
        $this->assertEquals(
            "Xml document does not contain statement report",
            $this->fakeMissingStatementException->getMessage()
        );
    }
}
