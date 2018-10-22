<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki\Parser;

use PHPUnit\Framework\TestCase;

/**
 * Class ParserTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass Parser
 * @internal
 */
class ParserTest extends TestCase
{
    /** @var Parser */
    protected $fakeParser;

    protected function setUp(): void
    {
        $this->fakeParser = new Parser();
    }
}
