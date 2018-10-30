<?php

namespace Wearesho\Pvbki\Exceptions;

use Wearesho\Pvbki;

/**
 * Class InvalidModeException
 * @package Wearesho\Pvbki\Exceptions
 */
class UnsupportedMode extends \InvalidArgumentException implements Pvbki\Exception
{
    /** @var int */
    protected $mode;

    public function __construct(int $mode, int $code = 0, \Throwable $previous = null)
    {
        $this->mode = $mode;

        parent::__construct("Configured unsupported service mode: " . $mode, $code, $previous);
    }

    public function getMode(): int
    {
        return $this->mode;
    }
}
