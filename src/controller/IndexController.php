<?php

class IndexController extends AbstractController {

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
            FormHelper::sanitizeInput();

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
}