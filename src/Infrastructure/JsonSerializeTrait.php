<?php

namespace Wearesho\Pvbki\Infrastructure;

/**
 * Trait JsonSerializeTrait
 * @package Wearesho\Pvbki\Infrastructure
 *
 * @deprecated Incorrect usage of get_object_vars
 */
trait JsonSerializeTrait
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
