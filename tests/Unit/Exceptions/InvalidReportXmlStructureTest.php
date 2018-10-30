<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class InvalidReportXmlStructureTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass \Wearesho\Pvbki\Exceptions\InvalidReportXmlStructure
 * @internal
 */
class InvalidReportXmlStructureTest extends TestCase
{
    protected const XML = 'xml';

    /** @var Pvbki\Exceptions\InvalidReportXmlStructure */
    protected $fakeInvalidReportXmlStructure;

    protected function setUp(): void
    {
        $this->fakeInvalidReportXmlStructure = new Pvbki\Exceptions\InvalidReportXmlStructure(static::XML);
    }

    public function testToString(): void
    {
        $this->assertEquals(
            Pvbki\Exceptions\InvalidReportXmlStructure::class . ': '
            . $this->fakeInvalidReportXmlStructure->getMessage() . ' in '
            . $this->fakeInvalidReportXmlStructure->getFile() . ':'
            . $this->fakeInvalidReportXmlStructure->getLine() . PHP_EOL
            . 'Stack trace:' . PHP_EOL
            . $this->fakeInvalidReportXmlStructure->getTraceAsString() . PHP_EOL
            . 'XML: ' . static::XML,
            $this->fakeInvalidReportXmlStructure->__toString()
        );
    }

    public function testGetXml(): void
    {
        $this->assertEquals(static::XML, $this->fakeInvalidReportXmlStructure->getXml());
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Pvbki\Exception::class, $this->fakeInvalidReportXmlStructure);
    }
}
