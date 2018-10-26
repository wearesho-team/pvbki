<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Event
 * @package Wearesho\Pvbki\Elements
 */
class Event extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Event';
    public const NAME = 'event';
    public const WHEN = 'when';
    public const PROVIDER = 'provider';

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
