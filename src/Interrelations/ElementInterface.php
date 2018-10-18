<?php

namespace Wearesho\Pvbki\Interrelations;

/**
 * Interface ElementInterface
 * @package Wearesho\Pvbki\Interrelations
 */
interface ElementInterface extends \JsonSerializable
{
    public static function tag(): string;
}
