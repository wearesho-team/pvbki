<?php

namespace Wearesho\Pvbki\Tests\Unit\Sentence;

use Wearesho\Pvbki\Sentence\Translation;

use PHPUnit\Framework\TestCase;

/**
 * Class TranslationTest
 * @package Wearesho\Pvbki\Tests\Unit\Sentence
 * @coversDefaultClass Translation
 * @internal
 */
class TranslationTest extends TestCase
{
    protected const UA = 'test_ua';
    protected const RU = 'test_ru';
    protected const EN = 'test_en';

    /** @var Translation */
    protected $fakeTranslation;

    protected function setUp(): void
    {
        $this->fakeTranslation = new Translation(
            static::UA,
            static::RU,
            static::EN
        );
    }

    public function testEn(): void
    {
        $this->assertEquals(static::EN, $this->fakeTranslation->en());
    }

    public function testRu(): void
    {
        $this->assertEquals(static::RU, $this->fakeTranslation->ru());
    }

    public function testUa(): void
    {
        $this->assertEquals(static::UA, $this->fakeTranslation->ua());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'ua' => static::UA,
                'ru' => static::RU,
                'en' => static::EN,
            ],
            $this->fakeTranslation->jsonSerialize()
        );
    }
}
