<?php

namespace Wearesho\Pvbki\Infrastructure;

/**
 * Trait JsonSerializeTrait
 * @package Wearesho\Pvbki\Infrastructure
 */
trait JsonSerializeTrait
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
