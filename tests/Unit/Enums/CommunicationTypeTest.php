<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\CommunicationType;

use PHPUnit\Framework\TestCase;

/**
 * Class CommunicationTypeTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass CommunicationType
 * @internal
 */
class CommunicationTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CommunicationType::HOME(), new CommunicationType(CommunicationType::HOME));
        $this->assertEquals(CommunicationType::OFFICE(), new CommunicationType(CommunicationType::OFFICE));
        $this->assertEquals(CommunicationType::MOBILE(), new CommunicationType(CommunicationType::MOBILE));
        $this->assertEquals(CommunicationType::FAX(), new CommunicationType(CommunicationType::FAX));
        $this->assertEquals(CommunicationType::MAIL(), new CommunicationType(CommunicationType::MAIL));
        $this->assertEquals(CommunicationType::WEB(), new CommunicationType(CommunicationType::WEB));

        $this->assertNull((new CommunicationType(null))->jsonSerialize());
        $this->assertNull(CommunicationType::UNDEFINED()->getValue());
    }
}
