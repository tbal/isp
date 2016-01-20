<?php

namespace TiloBaller\Persistence\Driver;

/**
 * Class MysqlDriver
 *
 * @package TiloBaller\Persistence\Driver
 */
class MysqlDriver extends AbstractDriver {

    /**
     * @var string
     */
    protected $prefix = 'mysql';

    /**
     * @var int
     */
    protected $defaultPort = 3306;

    /**
     * @return string
     */
    public function getDsn() {
        return sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=utf8',
            $this->prefix,
            $this->getHost(),
            $this->getPort(),
            getenv('DB_NAME')
        );
    }

    /**
     * @return string|null
     */
    public function getUser() {
        return getenv('DB_USER');
    }

    /**
     * @return string|null
     */
    public function getPassword() {
        return getenv('DB_PASS');
    }

    /**
     * @return string
     */
    protected function getHost() {
        return getenv('DB_HOST') ?: 'localhost';
    }

    /**
     * @return int
     */
    protected function getPort() {
        return getenv('DB_PORT') ? (int)getenv('DB_PORT') : $this->defaultPort;
    }
}