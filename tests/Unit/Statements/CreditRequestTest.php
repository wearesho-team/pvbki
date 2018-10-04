<?php

namespace Wearesho\Pvbki\Tests\Unit\Statements;

use Wearesho\Pvbki\Identifications\OkpoIdentification;
use Wearesho\Pvbki\Statements;
use Wearesho\Pvbki\Tests\StatementTestCase;

/**
 * Class CreditRequestTest
 * @package Wearesho\Pvbki\Tests\Unit\Statements
 * @coversDefaultClass Statements\CreditRequest
 * @internal
 */
class CreditRequestTest extends StatementTestCase
{
    protected const VALID_OKPO_NUMBER = '12345678';

    /** @var Statements\CreditRequest */
    protected $fakeStatement;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakeStatement = new Statements\CreditRequest(
            new OkpoIdentification(static::VALID_OKPO_NUMBER),
            $this->statementType
        );
    }

    public function testGetIdentification(): void
    {
        $this->assertEquals(
            new OkpoIdentification(static::VALID_OKPO_NUMBER),
            $this->fakeStatement->getIdentification()
        );
    }
}