<?php

namespace Wearesho\Pvbki\Tests\Unit\Exceptions;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Exceptions\InvalidReportXmlStructure;

/**
 * Class InvalidReportXmlStructureTest
 * @package Wearesho\Pvbki\Tests\Unit\Exceptions
 * @coversDefaultClass InvalidReportXmlStructure
 * @internal
 */
class InvalidReportXmlStructureTest extends TestCase
{
    protected const XML = 'xml';

    /** @var InvalidReportXmlStructure */
    protected $fakeInvalidReportXmlStructure;

    protected function setUp(): void
    {
        $this->fakeInvalidReportXmlStructure = new InvalidReportXmlStructure(static::XML);
    }

    public function testGetXml(): void
    {
        $this->assertEquals(static::XML, $this->fakeInvalidReportXmlStructure->getXml());
    }
}
