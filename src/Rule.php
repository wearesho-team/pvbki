<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki\Enums\RuleType;

/**
 * Class Rule
 * @package Wearesho\Pvbki
 */
class Rule
{
    /** @var RuleType */
    protected $type;

    /** @var array */
    protected $arguments;

    public function __construct(RuleType $type, string ...$arguments)
    {
        $this->type = $type;
        $this->arguments = $arguments;
    }

    public function getType(): RuleType
    {
        return $this->type;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }
}
