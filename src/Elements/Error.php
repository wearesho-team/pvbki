<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Error
 * @package Wearesho\Pvbki\Elements
 */
class Error implements ElementInterface
{
    public const CODE = 'FaultCode';
    public const MESSAGE = 'FaultMessage';
    public const TYPE = 'FaultType';

    /** @var string */
    protected $code;

    /** @var string */
    protected $message;

    /** @var string */
    protected $type;

    public function __construct(
        string $code = null,
        string $message = null,
        string $type = null
    ) {
        $this->code = $code;
        $this->message = $message;
        $this->type = $type;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => $this->type,
            'code' => $this->code,
            'message' => $this->message,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::CODE => ParameterType::STRING,
            static::MESSAGE => ParameterType::STRING,
            static::TYPE => ParameterType::STRING,
        ];
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
