<?php

namespace TiloBaller\Mvc\Domain\Repository;

use TiloBaller\Mvc\Domain\Model\NewsModel;

class NewsRepository extends AbstractRepository {

    /**
     * Adds a new news to the database and returns the id of the inserted news entry
     *
     * @param NewsModel $news
     * @return NewsModel
     */
    public function add(NewsModel $news) {
        $this->db->query(
            'INSERT INTO ' . $this->getEntityName()
            . ' (`created`, `updated`, `date`, `author`, `title`, `abstract`, `body`)'
            . ' VALUES (?, ?, ?, ?, ?, ?, ?)',
            array(
                time(),
                time(),
                $news->getDate(),
                $news->getAuthor(),
                $news->getTitle(),
                $news->getAbstract(),
                $news->getBody()
            )
        );

        return $this->getOneById((int)$this->db->getConnection()->lastInsertId());
    }

    /**
     * @param NewsModel $news
     * @return NewsModel
     */
    public function update(NewsModel $news) {
        $this->db->query(
            'UPDATE ' . $this->getEntityName()
            . ' SET `updated` = ?, `date` = ?, `author` = ?, `title` = ?, `abstract` = ?, `body` = ?'
            . ' WHERE id = ?',
            array(
                time(),
                $news->getDate(),
                $news->getAuthor(),
                $news->getTitle(),
                $news->getAbstract(),
                $news->getBody(),
                $news->getId()
            )
        );

        return $this->getOneById($news->getId());
    }

    /**
     * @param NewsModel $news
     * @return bool
     */
    public function remove(NewsModel $news) {
        $stmt = $this->db->query(
            'DELETE FROM ' . $this->getEntityName()
            . ' WHERE id = ?',
            array(
                $news->getId()
            )
        );

        return $stmt->rowCount() > 0;
    }
}
