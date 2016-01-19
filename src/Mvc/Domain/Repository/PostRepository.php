<?php

namespace TiloBaller\Mvc\Domain\Repository;

use TiloBaller\Mvc\Domain\Model\PostModel;

class PostRepository extends AbstractRepository {

    /**
     * Adds a new post to the database and returns the id of the inserted post entry
     *
     * @param PostModel $post
     * @return PostModel
     */
    public function add(PostModel $post) {
        $this->db->query(
            'INSERT INTO ' . $this->getEntityName()
            . ' (`created`, `updated`, `date`, `author`, `title`, `abstract`, `body`)'
            . ' VALUES (?, ?, ?, ?, ?, ?, ?)',
            array(
                time(),
                time(),
                $post->getDate(),
                $post->getAuthor(),
                $post->getTitle(),
                $post->getAbstract(),
                $post->getBody()
            )
        );

        return $this->getOneById((int)$this->db->getConnection()->lastInsertId());
    }

    /**
     * @param PostModel $post
     * @return PostModel
     */
    public function update(PostModel $post) {
        $this->db->query(
            'UPDATE ' . $this->getEntityName()
            . ' SET `updated` = ?, `date` = ?, `author` = ?, `title` = ?, `abstract` = ?, `body` = ?'
            . ' WHERE id = ?',
            array(
                time(),
                $post->getDate(),
                $post->getAuthor(),
                $post->getTitle(),
                $post->getAbstract(),
                $post->getBody(),
                $post->getId()
            )
        );

        return $this->getOneById($post->getId());
    }

    public function remove(PostModel $post) {
        return $this->db->query(
            'DELETE FROM ' . $this->getEntityName()
            . ' WHERE id = ?',
            array(
                $post->getId()
            )
        );
    }
}
