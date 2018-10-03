<?php

namespace Wearesho\Pvbki;

use Horat1us\Environment;

/**
 * Class EnvironmentConfig
 * @package Wearesho\Pvbki
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    public function __construct(string $keyPrefix = 'PVBKI_')
    {
        parent::__construct($keyPrefix);
    }

    /**
     * @inheritdoc
     */
    public function getUsername(): string
    {
        return $this->getEnv('USERNAME');
    }

    /**
     * @inheritdoc
     */
    public function getPassword(): string
    {
        return $this->getEnv('PASSWORD');
    }

    /**
     * @inheritdoc
     */
    public function getKey(): string
    {
        return $this->getEnv('KEY');
    }
}
