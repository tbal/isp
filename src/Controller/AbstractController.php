<?php

namespace TiloBaller\Controller;

abstract class AbstractController {

    public function __construct() {
        $this->loadPartial('header');
    }

    public function __destruct() {
        $this->loadPartial('footer');
    }

    protected function loadTemplate($template) {
        require_once(__DIR__ . '/../Templates/' . ucfirst($template) . '.php');
    }

    protected function loadPartial($partial) {
        require_once(__DIR__ . '/../Templates/Partials/' . ucfirst($partial) . '.php');
    }
}