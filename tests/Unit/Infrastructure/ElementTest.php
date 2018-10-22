<?php

namespace Wearesho\Pvbki\Tests\Unit\Infrastructure;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Collections\RuleCollection;
use Wearesho\Pvbki\Enums\RuleType;
use Wearesho\Pvbki\Infrastructure\Element;
use Wearesho\Pvbki\Rule;

/**
 * Class ElementTest
 * @package Wearesho\Pvbki\Tests\Unit\Infrastructure
 * @coversDefaultClass Element
 * @internal
 */
class ElementTest extends TestCase
{
    /** @var Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class('test_value') extends Element
        {
            public const ROOT = 'root';

            /** @var string */
            protected $value;

            public function __construct(string $value)
            {
                $this->value = $value;
            }

            public static function arguments(): RuleCollection
            {
                return new RuleCollection([new Rule(RuleType::STRING(), 'value')]);
            }
        };
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'value' => 'test_value',
            ],
            $this->fakeElement->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('root', $this->fakeElement::tag());
    }
}
