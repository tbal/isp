<?php

namespace TiloBaller\Mvc\Controller;

/**
 * Class AbstractController
 *
 * @package TiloBaller\Mvc\Controller
 */
abstract class AbstractController {

    /**
     * @var array
     */
    protected $request;

    /**
     * Constructor
     *
     * @param array $request
     */
    public function __construct(array $request = array()) {
        $this->request = $request;

        $this->loadTemplateFile('header', TRUE);
    }

    /**
     * Destructor
     */
    public function __destruct() {
        if (http_response_code() === 404) {
            $this->render('404');
        }

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
     * @param array $vars Array of variables to make available in template.
     *                    E.g. with $vars = array('foo' => 'bar') you can use $foo inside the template.
     */
    protected function render($template, array $vars = array()) {
        $this->loadTemplateFile($template, FALSE, $vars);
    }

    /**
     * @param $name
     * @param bool $partial
     * @param array $vars
     */
    private function loadTemplateFile($name, $partial = FALSE, array $vars = array()) {
        extract($vars);

        require_once(__DIR__ . '/../Templates/' . ($partial ? 'Partials/' : '')
            . ucfirst(filter_var(trim($name), FILTER_SANITIZE_STRING)) . '.php');
    }
}