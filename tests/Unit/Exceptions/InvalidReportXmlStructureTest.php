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

    public function testToString(): void
    {
        $this->assertEquals(
            'Wearesho\Pvbki\Exceptions\InvalidReportXmlStructure:'
            . ' Xml document have invalid structure in '
            . '/home/kartavik/projects/pvbki/tests/Unit/Exceptions/InvalidReportXmlStructureTest.php:23
Stack trace:
#0 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/Framework/TestCase.php(840): '
            . 'Wearesho\Pvbki\Tests\Unit\Exceptions\InvalidReportXmlStructureTest->setUp()
#1 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/Framework/TestResult.php(665): '
            . 'PHPUnit\Framework\TestCase->runBare()
#2 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/Framework/TestCase.php(798): '
            . 'PHPUnit\Framework\TestResult'
            . '->run(Object(Wearesho\Pvbki\Tests\Unit\Exceptions\InvalidReportXmlStructureTest))
#3 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/Framework/TestSuite.php(750): '
            . 'PHPUnit\Framework\TestCase->run(Object(PHPUnit\Framework\TestResult))
#4 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/TextUI/TestRunner.php(586): '
            . 'PHPUnit\Framework\TestSuite->run(Object(PHPUnit\Framework\TestResult))
#5 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/TextUI/Command.php(203): '
            . 'PHPUnit\TextUI\TestRunner->doRun(Object(PHPUnit\Framework\TestSuite), Array, true)
#6 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/src/TextUI/Command.php(159): '
            . 'PHPUnit\TextUI\Command->run(Array, true)
#7 /home/kartavik/projects/pvbki/vendor/phpunit/phpunit/phpunit(53): PHPUnit\TextUI\Command::main()
#8 {main}
XML: xml',
            $this->fakeInvalidReportXmlStructure->__toString()
        );
    }

    public function testGetXml(): void
    {
        $this->assertEquals(static::XML, $this->fakeInvalidReportXmlStructure->getXml());
    }
}
