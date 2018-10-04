<?php

namespace Wearesho\Pvbki\Tests\Unit\Statements;

use Wearesho\Pvbki\Statements;
use Wearesho\Pvbki\Tests\StatementTestCase;

/**
 * Class CreditResponseTest
 * @package Wearesho\Pvbki\Tests\Unit\Statements
 * @coversDefaultClass Statements\StatementResponse
 * @internal
 */
class CreditResponseTest extends StatementTestCase
{
    protected const BODY = 'body';

    /** @var Statements\StatementResponse */
    protected $fakeStatement;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakeStatement = new Statements\StatementResponse(
            new \DOMDocument('1.0', 'utf-8'),
            $this->statementType
        );
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            new \DOMDocument('1.0', 'utf-8'),
            $this->fakeStatement->getBody()
        );
    }
}
