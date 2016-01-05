<?php

namespace TiloBaller\Controller;

abstract class AbstractController {

    public function __construct() {
        require_once(__DIR__ . '/../Templates/Partials/Header.php');
    }

    protected function loadTemplate($template) {
        require_once(__DIR__ . '/../Templates/' . ucfirst($template) . '.php');
    }

    public function __destruct() {
        require_once(__DIR__ . '/../Templates/Partials/Footer.php');
    }
}