<?php

namespace Wearesho\Pvbki\Sentence;

/**
 * Class Translation
 * @package Wearesho\Pvbki\Sentence
 */
class Translation implements \JsonSerializable
{
    /** @var string|null */
    protected $ua;

    /** @var string|null */
    protected $ru;

    /** @var string|null */
    protected $en;

    public function __construct(?string $ua, ?string $ru, ?string $en)
    {
        $this->ua = $ua;
        $this->ru = $ru;
        $this->en = $en;
    }

    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this), function ($item) {
            return $item !== null && !empty($item);
        });
    }

    public function ua(): ?string
    {
        return $this->ua;
    }

    public function ru(): ?string
    {
        return $this->ru;
    }

    public function en(): ?string
    {
        return $this->en;
    }
}
