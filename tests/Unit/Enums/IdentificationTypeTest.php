<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\IdentificationType;

use PHPUnit\Framework\TestCase;

/**
 * Class IdentificationTypeTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass IdentificationType
 * @internal
 */
class IdentificationTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(IdentificationType::PASSPORT(), new IdentificationType(IdentificationType::PASSPORT));
        $this->assertEquals(
            IdentificationType::BIRTH_CERTIFICATE(),
            new IdentificationType(IdentificationType::BIRTH_CERTIFICATE)
        );
        $this->assertEquals(
            IdentificationType::CERTIFICATE_OBLIGATORY_INSURANCE_NUMBER(),
            new IdentificationType(IdentificationType::CERTIFICATE_OBLIGATORY_INSURANCE_NUMBER)
        );
        $this->assertEquals(
            IdentificationType::COMPOSITE_KEY(),
            new IdentificationType(IdentificationType::COMPOSITE_KEY)
        );
        $this->assertEquals(
            IdentificationType::DOCUMENTS_LACK(),
            new IdentificationType(IdentificationType::DOCUMENTS_LACK)
        );
        $this->assertEquals(
            IdentificationType::I_5(),
            new IdentificationType(IdentificationType::I_5)
        );
        $this->assertEquals(
            IdentificationType::INTERNATIONAL_PASSPORT(),
            new IdentificationType(IdentificationType::INTERNATIONAL_PASSPORT)
        );
        $this->assertEquals(
            IdentificationType::MARRIAGE_CERTIFICATE(),
            new IdentificationType(IdentificationType::MARRIAGE_CERTIFICATE)
        );
        $this->assertEquals(
            IdentificationType::PERMIT_FOR_PERMANENT_RESIDENCE(),
            new IdentificationType(IdentificationType::PERMIT_FOR_PERMANENT_RESIDENCE)
        );
        $this->assertEquals(
            IdentificationType::REGISTRATION_COMPANY_NUMBER(),
            new IdentificationType(IdentificationType::REGISTRATION_COMPANY_NUMBER)
        );
        $this->assertEquals(
            IdentificationType::STATE_NUMBER_REGISTRATION_RECORD(),
            new IdentificationType(IdentificationType::STATE_NUMBER_REGISTRATION_RECORD)
        );
        $this->assertEquals(
            IdentificationType::UNIQUE_NUMBER(),
            new IdentificationType(IdentificationType::UNIQUE_NUMBER)
        );
        $this->assertEquals(
            IdentificationType::TRAVELING_PASSPORT(),
            new IdentificationType(IdentificationType::TRAVELING_PASSPORT)
        );
        $this->assertEquals(
            IdentificationType::TAX_ID(),
            new IdentificationType(IdentificationType::TAX_ID)
        );
        $this->assertEquals(
            IdentificationType::TEMPORARY_IDENTITY_CARD_OF_UKRAINE(),
            new IdentificationType(IdentificationType::TEMPORARY_IDENTITY_CARD_OF_UKRAINE)
        );

        $this->assertNull((new IdentificationType(null))->jsonSerialize());
        $this->assertNull(IdentificationType::UNDEFINED()->getValue());
    }
}
