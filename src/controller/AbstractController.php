<?php

abstract class AbstractController {

    public function __construct() {
        require_once(__DIR__ . '/../templates/partials/header.php');
    }

    protected function loadTemplate($template) {
        require_once(__DIR__ . '/../templates/' . $template . '.php');
    }

    public function __destruct() {
        require_once(__DIR__ . '/../templates/partials/footer.php');
    }
}