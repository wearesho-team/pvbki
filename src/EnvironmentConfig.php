<?php

namespace Wearesho\Pvbki;

use Horat1us\Environment;
use Wearesho\Pvbki\Exceptions\InvalidModeException;

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
    public function getAccessPoint(): string
    {
        return $this->getEnv('ACCESS_POINT');
    }

    /**
     * @inheritdoc
     */
    public function getKey(): string
    {
        return $this->getEnv('KEY');
    }

    /**
     * @inheritdoc
     */
    public function getUrl(): string
    {
        return $this->getEnv('URL', function (): string {
            $mode = $this->getMode();

            switch ($mode) {
                case ConfigInterface::TEST_MODE:
                    return ConfigInterface::TEST_URL;
                case ConfigInterface::PRODUCTION_MODE:
                    return ConfigInterface::PRODUCTION_URL;
                default:
                    throw new InvalidModeException($mode);
            }
        });
    }

    /**
     * @inheritdoc
     */
    public function getMode(): int
    {
        return $this->getEnv('MODE', ConfigInterface::PRODUCTION_MODE);
    }
}
