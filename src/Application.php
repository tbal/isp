<?php

namespace TiloBaller;

class Application {

    public function __construct() {
        // sanitize request parameters
        $request = array_merge($_GET, $_POST);
        array_walk($request, function(&$value) {
            $value = filter_var(trim($value), FILTER_SANITIZE_STRING);
        });

        // determine controller
        $class = '\\TiloBaller\\Controller\\' . ucfirst(isset($request['view']) ? $request['view'] : 'index') . 'Controller';

        // check if requested controller exists
        if (!class_exists($class)) {
            throw new \Exception(sprintf('Requested controller \'%s\' does not exist.', $class));
        }

        // load controller
        (new $class($request))->init();
    }
}