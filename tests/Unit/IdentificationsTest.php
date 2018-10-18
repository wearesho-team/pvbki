<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Identifications;

/**
 * Class IdentificationsTest
 * @package Wearesho\Pvbki\Tests\Unit
 */
class IdentificationsTest extends TestCase
{
    public function testCorrectPassport(): void
    {
        $series = 'AK';
        $number = '123456';
        $passport = new Identifications\Passport($series, $number);

        $this->assertEquals($series . $number, $passport->getId());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Validation failed for data: seriesnumber
     */
    public function testInvalidPassport(): void
    {
        new Identifications\Passport('series', 'number');
    }

    public function testCorrectOkpo(): void
    {
        $number = '12345678';
        $okpo = new Identifications\Okpo($number);

        $this->assertEquals($number, $okpo->getId());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Validation failed for data: 123456
     */
    public function testInvalidOkpo(): void
    {
        new Identifications\Okpo('123456');
    }

    public function testCorrectDrfo(): void
    {
        $number = '1234567890';
        $drfo = new Identifications\Drfo($number);

        $this->assertEquals($number, $drfo->getId());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Validation failed for data: 123456
     */
    public function testInvalidDrfo(): void
    {
        new Identifications\Drfo('12345678');
    }

    public function testCorrectComplex(): void
    {
        $name = 'Name';
        $surname = 'Surname';
        $date = Carbon::parse('1998-03-12');
        $complex = new Identifications\Complex($name, $surname, $date);

        $this->assertEquals(
            $name . $surname . $date->toDateString(),
            $complex->getId()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Validation failed for data:
     */
    public function testInvalidNameComplex(): void
    {
        new Identifications\Complex('', 'Surname', Carbon::now());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Validation failed for data: Name: Name; Surname:
     */
    public function testInvalidSurnameComplex(): void
    {
        new Identifications\Complex('Name', '', Carbon::now());
    }
}
