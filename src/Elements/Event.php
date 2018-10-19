<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Infrastructure\Element;

/**
 * Class Event
 * @package Wearesho\Pvbki\Elements
 */
class Event extends Element
{
    /** @var string */
    protected $name;

    /** @var \DateTimeInterface */
    protected $when;

    /** @var int|null */
    protected $provider;

    public function __construct(string $name, \DateTimeInterface $when, ?int $provider)
    {
        $this->name = $name;
        $this->when = $when;
        $this->provider = $provider;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWhen(): \DateTimeInterface
    {
        return $this->when;
    }

    public function getProvider(): ?int
    {
        return $this->provider;
    }
}
