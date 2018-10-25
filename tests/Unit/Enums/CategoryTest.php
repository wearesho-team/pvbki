<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\Category;

use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Category
 * @internal
 */
class CategoryTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Category::COLLATERAL(), new Category(Category::COLLATERAL));
        $this->assertEquals(Category::COLLATERAL_AMOUNT(), new Category(Category::COLLATERAL_AMOUNT));
        $this->assertEquals(Category::CREDIT_LIMIT(), new Category(Category::CREDIT_LIMIT));
        $this->assertEquals(Category::CURRENCY(), new Category(Category::CURRENCY));
        $this->assertEquals(Category::EVENT(), new Category(Category::EVENT));
        $this->assertEquals(Category::INSTALMENT_AMOUNT(), new Category(Category::INSTALMENT_AMOUNT));
        $this->assertEquals(Category::NEGATIVE_STATUS(), new Category(Category::NEGATIVE_STATUS));
        $this->assertEquals(Category::OPEN_AMOUNT(), new Category(Category::OPEN_AMOUNT));
        $this->assertEquals(Category::OPEN_LIMIT(), new Category(Category::OPEN_LIMIT));
        $this->assertEquals(Category::OVERDUE_AMOUNT(), new Category(Category::OVERDUE_AMOUNT));
        $this->assertEquals(Category::PHASE_ID(), new Category(Category::PHASE_ID));
        $this->assertEquals(Category::REST_AMOUNT(), new Category(Category::REST_AMOUNT));
        $this->assertEquals(Category::ROLE_ID(), new Category(Category::ROLE_ID));
        $this->assertEquals(Category::TOTAL_AMOUNT(), new Category(Category::TOTAL_AMOUNT));
        $this->assertEquals(Category::TYPE(), new Category(Category::TYPE));

        $this->assertNull((new Category(null))->jsonSerialize());
        $this->assertNull(Category::UNDEFINED()->getValue());
    }
}
