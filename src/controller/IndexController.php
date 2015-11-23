<?php

class IndexController {

    public function __construct() {
        require_once(__DIR__ . '/../templates/partials/header.php');
    }

    public function init() {
        $validator = new Validator();
        $validator->addRule('salutation',   Validator::RULE_REQUIRED);
        $validator->addRule('firstname',    Validator::RULE_REQUIRED);
        $validator->addRule('lastname',     Validator::RULE_REQUIRED);
        $validator->addRule('street',       Validator::RULE_REQUIRED);
        $validator->addRule('zip',          Validator::RULE_REQUIRED);
        $validator->addRule('zip',          Validator::RULE_ZIP);
        $validator->addRule('city',         Validator::RULE_REQUIRED);
        $validator->addRule('email',        Validator::RULE_REQUIRED);
        $validator->addRule('email',        Validator::RULE_EMAIL);
        $validator->addRule('phone',        Validator::RULE_PHONE);
        $validator->addRule('shipping',     Validator::RULE_REQUIRED);

        // form was submitted
        if (isset($_REQUEST['submit'])) {
            $this->sanitizeInput();

            if ($validator->validate()) {
                // valid -> show results
                $this->loadTemplate('result');
            } else {
                // form has errors -> show again
                $this->loadTemplate('form');
            }

        // show empty form
        } else {
            $this->loadTemplate('form');
        }
    }

    private function sanitizeInput() {
        array_walk($_REQUEST, function(&$value, $key) {
            $value = filter_var(trim($value), FILTER_SANITIZE_STRING);
        });
    }

    protected function loadTemplate($template) {
        require_once(__DIR__ . '/../templates/' . $template . '.php');
    }

    public function __destruct() {
        require_once(__DIR__ . '/../templates/partials/footer.php');
    }
}