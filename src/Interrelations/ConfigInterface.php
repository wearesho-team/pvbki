<?php

namespace Wearesho\Pvbki\Interrelations;

/**
 * Interface ConfigInterface
 * @package Wearesho\Pvbki\Interrelations
 */
interface ConfigInterface
{
    public const TEST_URL = 'https://test.pvbki.com/reverse-service/default.asmx';
    public const PRODUCTION_URL = 'https://secure.pvbki.com/reverse-service/default.asmx';

    public const TEST_MODE = 0;
    public const PRODUCTION_MODE = 1;

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
     * The name of the client's access point to the service
     *
     * @return string
     */
    public function getAccessPoint(): string;

    /**
     * Client access key to the service (generated and issued in the PVBKI)
     *
     * @return string
     */
    public function getKey(): string;

    /**
     * Url for service requests
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Test or production mode
     *
     * @return int
     */
    public function getMode(): int;
}
