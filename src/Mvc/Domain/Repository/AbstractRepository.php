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
     * @param array $orderBy
     * @return array
     */
    public function getAll(array $orderBy = array('updated' => 'DESC')) {
        $orderByParams = $orderByStringChunks = array();
        foreach ($orderBy as $field => $direction) {
            $orderByParams[] = $field;
            $orderByStringChunks[] = '? ' . (strtoupper($direction) === 'ASC' ? 'ASC' : 'DESC');
        }
        $orderBy = count($orderByStringChunks) ? (' ORDER BY ' . implode(', ', $orderByStringChunks)) : '';

        $stmt = $this->db->query('SELECT * FROM ' . $this->getEntityName() . $orderBy, $orderByParams);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->getEntityClass());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOneById($id) {
        $stmt = $this->db->query('SELECT * FROM ' . $this->getEntityName() . ' WHERE id = ?', array($id));
        return $stmt->fetchObject($this->getEntityClass());
    }

}
