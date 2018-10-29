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
    protected const INVALID_XML = 'xml';

    /** @var InvalidReportXmlStructure */
    protected $fakeInvalidReportXmlStructure;

    protected function setUp(): void
    {
        $this->fakeInvalidReportXmlStructure = new InvalidReportXmlStructure(static::INVALID_XML);
    }

    public function testGetXml(): void
    {
        $this->assertEquals(static::INVALID_XML, $this->fakeInvalidReportXmlStructure->getXml());
    }
}
