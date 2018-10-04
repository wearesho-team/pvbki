<?php

namespace Wearesho\Pvbki\Exceptions;

/**
 * Class InvalidModeException
 * @package Wearesho\Pvbki\Exceptions
 */
class InvalidModeException extends \Exception
{
    /** @var int $mode */
    protected $mode;

    public function __construct(
        int $mode,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->mode = $mode;

        parent::__construct("Configured invalid service mode: " . $mode, $code, $previous);
    }

    public function getMode(): int
    {
        return $this->mode;
    }
}
