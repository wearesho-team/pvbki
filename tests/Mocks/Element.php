<?php

namespace Wearesho\Pvbki\Tests\Mocks;

/**
 * Class Element
 * @package Wearesho\Pvbki\Tests\Mocks
 * @internal
 */
class Element
{
    /** @var int */
    protected $value;

    /**
     * Element constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
