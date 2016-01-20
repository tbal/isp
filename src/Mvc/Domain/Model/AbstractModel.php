<?php

namespace TiloBaller\Mvc\Domain\Model;

/**
 * Class AbstractModel
 *
 * @package TiloBaller\Mvc\Domain\Model
 */
abstract class AbstractModel {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $created;

    /**
     * @var int
     */
    protected $updated;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param int $created
     */
    public function setCreated($created) {
        $this->created = $created;
    }

    /**
     * @return int
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * @param int $updated
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
    }
}