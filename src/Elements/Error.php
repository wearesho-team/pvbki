<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Error
 * @package Wearesho\Pvbki\Elements
 */
class Error extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'BackError';
    public const CODE = 'FaultCode';
    public const MESSAGE = 'FaultMessage';
    public const TYPE = 'FaultType';

    /** @var string|null */
    protected $code;

    /** @var string|null */
    protected $message;

    /** @var string|null */
    protected $type;

    public function __construct(?string $code, ?string $message, ?string $type)
    {
        $this->code = $code;
        $this->message = $message;
        $this->type = $type;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
