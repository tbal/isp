<?php

namespace TiloBaller\Library;

class Database {

    private $connection;

    private static $instance;

    /**
     * Returns the Database instance of this class
     *
     * @return \TiloBaller\Library\Database
     */
    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * Database via the 'new' operator from outside of this class.
     */
    protected function __construct() {
        $this->connection = new \mysqli(
            getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'), (int) getenv('DB_PORT')
        );

        if ($this->connection->connect_error) {
            throw new \Exception(sprintf(
                'Failed to connect to database: %s (%s)',
                $this->connection->connect_error,
                $this->connection->connect_errno
            ));
        }
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Database instance.
     *
     * @return void
     */
    private function __clone() {
    }

    /**
     * Private unserialize method to prevent unserializing of the Database
     * instance.
     *
     * @return void
     */
    private function __wakeup() {
    }

    public function query($sql) {
        $result = $this->connection->query($sql);

        if ($result !== TRUE) {
            throw new \Exception(sprintf(
                'Database query \'%s\' failed: %s (%s)',
                $sql,
                $this->connection->error,
                $this->connection->errno
            ));
        }

        return $result;
    }

    protected function __destruct() {
        $this->connection->close();
    }
}