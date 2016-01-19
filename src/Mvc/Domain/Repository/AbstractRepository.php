<?php

namespace TiloBaller\Mvc\Domain\Repository;

use TiloBaller\Persistence\Database;

abstract class AbstractRepository {

    /**
     * @var \PDO
     */
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * @return string
     */
    protected function getEntityClass() {
        return str_replace('Repository', 'Model', get_class($this));
    }
    /**
     * @return string
     */
    protected function getEntityName() {
        $classNameNamespaced = explode('\\', get_class($this));
        return str_replace('repository', '', strtolower(array_pop($classNameNamespaced)));
    }

    /**
     * @return Object
     */
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM ' . $this->getEntityName());
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->getEntityClass());
    }

    /**
     * @param $id
     * @return Object
     */
    public function getOneById($id) {
        $stmt = $this->db->query('SELECT * FROM ' . $this->getEntityName() . ' WHERE id = ?', array($id));
        return $stmt->fetchObject($this->getEntityClass());
    }

}
