<?php

namespace Wearesho\Pvbki\Exceptions;

use Wearesho\Pvbki;

/**
 * Class IdentificationDataValidation
 * @package Wearesho\Pvbki\Exceptions
 */
class IdentificationDataValidation extends \InvalidArgumentException implements Pvbki\Exception
{
    /** @var string */
    protected $data;

    public function __construct($data, int $code = 0, \Throwable $previous = null)
    {
        $this->data = $data;

        parent::__construct("Validation failed for data: " . $data, $code, $previous);
    }

    public function getData(): string
    {
        return $this->data;
    }
}
