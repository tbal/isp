<?php

namespace TiloBaller\Mvc\Controller;

abstract class AbstractController {

    protected $request;

    public function __construct(array $request = array()) {
        $this->request = $request;

        $this->loadTemplateFile('header', TRUE);
    }

    public function __destruct() {
        $this->loadTemplateFile('footer', TRUE);
    }

    /**
     * Default controller action
     */
    public function indexAction() {
        // Normally gets overwritten in extending controller.
        // Just implemented empty here for fallback purpose.
    }

    /**
     * @param string $template Name of the template
     * @param array $vars Array of variables to make available in template. E.g. with $vars = array('foo' => 'bar') you can use $foo inside the template.
     */
    protected function render($template, array $vars = array()) {
        $this->loadTemplateFile($template, FALSE, $vars);
    }

    private function loadTemplateFile($name, $partial = FALSE, array $vars = array()) {
        extract($vars);

        require_once(__DIR__ . '/../Templates/' . ($partial ? 'Partials/' : '')
            . ucfirst(filter_var(trim($name), FILTER_SANITIZE_STRING)) . '.php');
    }
}