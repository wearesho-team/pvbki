<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use Wearesho\Pvbki\Exceptions\InvalidReportXmlStructure;

use PHPUnit\Framework\TestCase;

/**
 * Class InvalidReportXmlStructureTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass InvalidReportXmlStructure
 * @internal
 */
class InvalidReportXmlStructureTest extends TestCase
{
    /** @var InvalidReportXmlStructure */
    protected $fakeInvalidReportXmlStructure;

    protected function setUp(): void
    {
        $this->fakeInvalidReportXmlStructure = new InvalidReportXmlStructure(new \DOMDocument());
    }

    public function testGetXml(): void
    {
        $this->assertEquals(new \DOMDocument(), $this->fakeInvalidReportXmlStructure->getXml());
    }
}
