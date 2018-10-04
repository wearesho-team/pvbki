<?php

namespace Wearesho\Pvbki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Statements\Interfaces\StatementInterface;
use Wearesho\Pvbki\Statements\StatementType;

/**
 * Class StatementTestCase
 * @package Wearesho\Pvbki\Tests
 */
class StatementTestCase extends TestCase
{
    /** @var StatementInterface */
    protected $fakeStatement;

    /** @var StatementType */
    protected $statementType;

    protected function setUp()
    {
        $this->statementType = new StatementType(
            array_rand(array_flip([
                StatementType::BASE,
                StatementType::SCORING,
            ]))
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            $this->statementType,
            $this->fakeStatement->getType()
        );
    }
}
