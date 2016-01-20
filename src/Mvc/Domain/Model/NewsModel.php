<?php

namespace TiloBaller\Mvc\Domain\Model;

/**
 * Class NewsModel
 *
 * @package TiloBaller\Mvc\Domain\Model
 */
class NewsModel extends AbstractModel {

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
     * @param string|null $format see http://php.net/manual/de/function.date.php
     * @return int
     */
    public function getDate($format = null) {
        return ($this->date && !empty($format)) ? date($format, $this->date) : $this->date;
    }

    /**
     * @param int|string $date
     */
    public function setDate($date) {
        if (empty($date)) {
            $this->date = null;
        } elseif (is_string($date)) {
            $this->date = strtotime($date);
        } elseif (is_int($date)) {
            $this->date = $date;
        } else {
            $this->date = null;
        }
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