<?php

declare(strict_types=1);

namespace Wearesho\Pvbki;

use Horat1us\Environment;

/**
 * Class EnvironmentConfig
 * @package Wearesho\Pvbki
 */
class EnvironmentConfig extends Environment\Config implements Interrelations\ConfigInterface
{
    public function __construct(string $keyPrefix = 'PVBKI_')
    {
        parent::__construct($keyPrefix);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername(): string
    {
        return $this->getEnv('USERNAME');
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword(): string
    {
        return $this->getEnv('PASSWORD');
    }

    /**
     * {@inheritdoc}
     */
    public function getAccessPoint(): string
    {
        return $this->getEnv('ACCESS_POINT');
    }

    /**
     * {@inheritdoc}
     */
    public function getKey(): string
    {
        return $this->getEnv('KEY');
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): string
    {
        return $this->getEnv('URL', function (): string {
            $mode = $this->getMode();
            switch ($mode) {
                case Interrelations\ConfigInterface::TEST_MODE:
                    return Interrelations\ConfigInterface::TEST_URL;
                case Interrelations\ConfigInterface::PRODUCTION_MODE:
                    return Interrelations\ConfigInterface::PRODUCTION_URL;
                default:
                    throw new Exceptions\UnsupportedMode($mode);
            }
        });
    }

    /**
     * {@inheritdoc}
     */
    public function getMode(): int
    {
        return (int)$this->getEnv('MODE', Interrelations\ConfigInterface::PRODUCTION_MODE);
    }
}
