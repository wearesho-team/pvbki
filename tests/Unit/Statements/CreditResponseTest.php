<?php

namespace Wearesho\Pvbki\Tests\Unit\Statements;

use Wearesho\Pvbki\Statements\CreditResponse;
use Wearesho\Pvbki\Tests\StatementTestCase;

/**
 * Class CreditResponseTest
 * @package Wearesho\Pvbki\Tests\Unit\Statements
 * @coversDefaultClass CreditResponse
 * @internal
 */
class CreditResponseTest extends StatementTestCase
{
    protected const BODY = 'body';

    /** @var CreditResponse */
    protected $fakeStatement;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakeStatement = new CreditResponse(static::BODY, $this->statementType);
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            static::BODY,
            $this->fakeStatement->getBody()
        );
    }
}
