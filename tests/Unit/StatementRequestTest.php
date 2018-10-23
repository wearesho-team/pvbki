<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class StatementRequestTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass \Wearesho\Pvbki\StatementRequest
 * @internal
 */
class StatementRequestTest extends TestCase
{
    /** @var Pvbki\Enums\StatementType */
    protected $type;

    protected function setUp(): void
    {
        $this->type = Pvbki\Enums\StatementType::SCORING();
    }

    public function testRequestWithComplex(): void
    {
        $name = 'Name';
        $surname = 'Surname';
        $date = Carbon::parse('1998-03-12');
        $complex = new Pvbki\Identifications\Complex($name, $surname, $date);
        $request = new Pvbki\StatementRequest($complex, $this->type);

        $this->assertEquals($complex, $request->getIdentification());
        $this->assertEquals($this->type, $request->getType());
    }

    public function testRequestWithPassport(): void
    {
        $series = 'AK';
        $number = '123456';
        $passport = new Pvbki\Identifications\Passport($series, $number);
        $request = new Pvbki\StatementRequest($passport, $this->type);

        $this->assertEquals($passport, $request->getIdentification());
        $this->assertEquals($this->type, $request->getType());
    }

    public function testRequestWithOkpo(): void
    {
        $number = '12345678';
        $okpo = new Pvbki\Identifications\Okpo($number);
        $request = new Pvbki\StatementRequest($okpo, $this->type);

        $this->assertEquals($okpo, $request->getIdentification());
        $this->assertEquals($this->type, $request->getType());
    }

    public function testRequestWithDrfo(): void
    {
        $number = '1234567890';
        $drfo = new Pvbki\Identifications\Drfo($number);
        $request = new Pvbki\StatementRequest($drfo, $this->type);

        $this->assertEquals($drfo, $request->getIdentification());
        $this->assertEquals($this->type, $request->getType());
    }
}
