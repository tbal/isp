<?php

namespace TiloBaller\Persistence\Driver;

class PostgresDriver extends AbstractDriver {

    /**
     * @var string
     */
    private $prefix = 'pgsql';

    /**
     * @var int
     */
    private $defaultPort = 5432;

    /**
     * @return string
     */
    public function getDsn() {
        return sprintf(
            '%s:host=%s;port=%d;dbname=%s;user=%s;password=%s',
            $this->prefix,
            $this->getHost(),
            $this->getPort(),
            getenv('DB_NAME'),
            getenv('DB_USER'),
            getenv('DB_PASS')
        );
    }

    /**
     * @return null
     */
    public function getUser() {
        return null;
    }

    /**
     * @return null
     */
    public function getPassword() {
        return null;
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