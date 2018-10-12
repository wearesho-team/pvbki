<?php

namespace Wearesho\Pvbki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Identifications\SubjectIdentificationInterface;

/**
 * Class IdentificationTestCase
 * @package Wearesho\Pvbki\Tests
 */
abstract class IdentificationTestCase extends TestCase
{
    /** @var SubjectIdentificationInterface */
    protected $fakeIdentification;

    abstract protected function expectedId(): string;

    public function testGetId(): void
    {
        $this->assertEquals($this->expectedId(), $this->fakeIdentification->getId());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->expectedId(), $this->fakeIdentification->jsonSerialize());
    }
}
