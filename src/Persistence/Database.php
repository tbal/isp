<?php

namespace TiloBaller\Persistence;

use TiloBaller\Persistence\Driver\DriverInterface;

/**
 * Class Database
 *
 * @package TiloBaller\Persistence
 */
class Database {

    /**
     * @var \PDO
     */
    private $connection;

    /**
     * @var Database
     */
    private static $instance;

    /**
     * Returns the Database instance of this class
     *
     * @return Database
     */
    public static function getInstance() {
        if (null === self::$instance) {
            $driver = getenv('DB_DRIVER');

            if (empty($driver)) {
                throw new \RuntimeException(sprintf('There is no implementation for the specified database driver \'%s\'.', $driver));
            }

            // determine database driver class
            $driverClass = '\\TiloBaller\\Persistence\\Driver\\'
                . ucfirst($driver) . 'Driver';

            // check if database driver class exists
            if (!class_exists($driverClass)) {
                throw new \RuntimeException(sprintf('Database driver \'%s\' does not exist.', $driverClass));
            }


            self::$instance = new static(new $driverClass);
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * Database via the 'new' operator from outside of this class.
     *
     * @param DriverInterface $driver
     */
    protected function __construct(DriverInterface $driver) {
        $this->connection = new \PDO(
            $driver->getDsn(),
            $driver->getUser(),
            $driver->getPassword(),
            array_merge(
                $driver->getOptions(),
                array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                )
            )
        );
    }

    /**
     * @param $statement
     * @param array $values
     * @return \PDOStatement
     */
    public function query($statement, array $values = array()) {
        $pdoStatement = $this->connection->prepare($statement);
        $pdoStatement->execute($values);

        return $pdoStatement;
    }

    /**
     * @return \PDO
     */
    public function getConnection() {
        return $this->connection;
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
     * Close connection
     */
    public function __destruct() {
        $this->connection = null;
    }
}