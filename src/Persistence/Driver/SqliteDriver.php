<?php

namespace TiloBaller\Persistence\Driver;

class SqliteDriver extends AbstractDriver {

    /**
     * @var string
     */
    private $prefix = 'sqlite';

    /**
     * @return string
     */
    public function getDsn() {
        return !empty(getenv('DB_TRANSIENT'))
            ? sprintf('%s::memory:', $this->prefix)
            : sprintf('%s:%s', $this->prefix, getenv('DB_NAME'));
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
}