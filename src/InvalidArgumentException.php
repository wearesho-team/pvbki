<?php

namespace Wearesho\Pvbki;

/**
 * Class InvalidArgumentException
 * @package Wearesho\Pvbki
 *
 * Base exception for all exceptions for this projects that contain error message about invalid argument
 * Use for handling all invalid argument exceptions in your own project
 *
 * @example try { ... } catch (Pvbki\InvalidArgumentException $exception) { ... }
 */
class InvalidArgumentException extends \InvalidArgumentException
{
}
