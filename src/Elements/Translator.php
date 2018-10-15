<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Translator
 * @package Wearesho\Pvbki\Elements
 */
class Translator extends Element
{
    public const UA = 'ua';
    public const RU = 'ru';
    public const EN = 'en';

    /** @var string|null */
    protected $ua;

    /** @var string|null */
    protected $ru;

    /** @var string|null */
    protected $en;

    public function jsonSerialize(): array
    {
        return [
            static::UA => $this->ua,
            static::RU => $this->ru,
            static::EN => $this->en,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::UA => ParameterType::STRING,
            static::RU => ParameterType::STRING,
            static::EN => ParameterType::STRING,
        ];
    }

    public function getUa(): ?string
    {
        return $this->ua;
    }

    public function getRu(): ?string
    {
        return $this->ru;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }
}
