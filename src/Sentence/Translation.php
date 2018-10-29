<?php

namespace Wearesho\Pvbki\Sentence;

use Wearesho\Pvbki;

/**
 * Class Translation
 * @package Wearesho\Pvbki\Sentence
 */
class Translation implements \JsonSerializable
{
    use Pvbki\Infrastructure\JsonSerializeTrait;

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
