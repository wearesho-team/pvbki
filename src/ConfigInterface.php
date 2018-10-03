<?php

namespace Wearesho\Pvbki;

/**
 * Interface ConfigInterface
 * @package Wearesho\Pvbki
 */
interface ConfigInterface
{
    /**
     * Your username in PVBKI service
     *
     * @return string
     */
    public function getUsername(): string;

    /**
     * Your password in PVBKI service
     *
     * @return string
     */
    public function getPassword(): string;

    /**
     * Client access key to the service (generated and issued in the PVBKI)
     *
     * @return string
     */
    public function getKey(): string;
}
