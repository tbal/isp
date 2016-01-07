<?php

namespace TiloBaller\Library;

class Database {

    private $connection;

    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
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

    private function __clone() {
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

    public function __destruct() {
        $this->connection->close();
    }
}