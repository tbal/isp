<?php

namespace TiloBaller\Mvc\Domain\Model;

class PostModel extends AbstractModel {

    /**
     * @var int
     */
    protected $date;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $abstract;

    /**
     * @var string
     */
    protected $body;

    /**
     * @return int
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author) {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAbstract() {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract($abstract) {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body) {
        $this->body = $body;
    }
}