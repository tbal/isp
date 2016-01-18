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
        $controllerClass = '\\TiloBaller\\Controller\\'
            . ucfirst(isset($request['controller']) ? $request['controller'] : 'default') . 'Controller';

        // check if requested controller exists
        if (!class_exists($controllerClass)) {
            throw new \RuntimeException(sprintf('Requested controller \'%s\' does not exist.', $controllerClass));
        }

        // determine action
        if (empty($request['action']) || $request['action'] === 'index') {
            $actionMethod = 'indexAction';
        } else {
            $actionMethod = trim(strtolower($request['action'])) . 'Action';

            // check if action exists in controller
            if (!method_exists($controllerClass, $actionMethod)) {
                throw new \BadMethodCallException(
                    sprintf('Requested action \'%s\' is not defined in controller \'%s\'.', $actionMethod, $controllerClass)
                );
            }
        }

        // call controller with action
        (new $controllerClass($request))->$actionMethod();
    }
}