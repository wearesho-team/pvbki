<?php

namespace Wearesho\Pvbki;

/**
 * Interface ElementInterface
 * @package Wearesho\Pvbki
 */
interface ElementInterface extends \JsonSerializable
{
    public static function tag(): string;
}
