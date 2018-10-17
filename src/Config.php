<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki\Exceptions\InvalidModeException;

/**
 * Class Config
 * @package Wearesho\Pvbki
 */
class Config implements ConfigInterface
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $password;

    /** @var string */
    protected $accessPoint;

    /** @var string */
    protected $key;

    /** @var int */
    protected $mode;

    /** @var string */
    protected $url;

    /**
     * @param string $username
     * @param string $password
     * @param string $accessPoint
     * @param string $key
     * @param int    $mode
     * @param string $url
     *
     * @throws InvalidModeException
     */
    public function __construct(
        string $username,
        string $password,
        string $accessPoint,
        string $key,
        int $mode = ConfigInterface::PRODUCTION_MODE,
        string $url = ConfigInterface::PRODUCTION_URL
    ) {
        if (!in_array($mode, [ConfigInterface::TEST_MODE, ConfigInterface::PRODUCTION_MODE])) {
            throw new InvalidModeException($mode);
        }

        $this->username = $username;
        $this->password = $password;
        $this->accessPoint = $accessPoint;
        $this->key = $key;
        $this->url = $url;
        $this->mode = $mode;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function getAccessPoint(): string
    {
        return $this->accessPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function getMode(): int
    {
        return $this->mode;
    }
}
