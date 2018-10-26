<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Education;

/**
 * Class EducationTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Education
 * @internal
 */
class EducationTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Education::OTHER(), new Education(Education::OTHER));
        $this->assertEquals(Education::ACADEMIC(), new Education(Education::ACADEMIC));
        $this->assertEquals(Education::BASIC(), new Education(Education::BASIC));
        $this->assertEquals(Education::CERTIFICATED_SECONDARY(), new Education(Education::CERTIFICATED_SECONDARY));
        $this->assertEquals(
            Education::NOT_CERTIFICATED_SECONDARY(),
            new Education(Education::NOT_CERTIFICATED_SECONDARY)
        );
        $this->assertEquals(Education::HIGHER(), new Education(Education::HIGHER));
        $this->assertEquals(Education::UNFINISHED(), new Education(Education::UNFINISHED));

        $this->assertNull((new Education(null))->jsonSerialize());
        $this->assertNull(Education::UNDEFINED()->getValue());
    }
}
