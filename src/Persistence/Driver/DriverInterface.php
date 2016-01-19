<?php

namespace TiloBaller\Persistence\Driver;

/**
 * Database Driver Interface
 */
interface DriverInterface {

    /**
     * @return string
     */
    public function getDsn();

    /**
     * @return string|null
     */
    public function getUser();

    /**
     * @return string|null
     */
    public function getPassword();

    /**
     * @return array|null
     */
    public function getOptions();
}
