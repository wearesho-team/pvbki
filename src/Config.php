<?php

namespace Wearesho\Pvbki;

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
    protected $key;

    public function __construct(string $username, string $password, string $key)
    {
        $this->username = $username;
        $this->password = $password;
        $this->key = $key;
    }

    /**
     * @inheritdoc
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @inheritdoc
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @inheritdoc
     */
    public function getKey(): string
    {
        return $this->key;
    }
}
