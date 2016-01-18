<?php

namespace TiloBaller\Controller;

use TiloBaller\Library\Validator;

class DefaultController extends AbstractController {

    public function indexAction() {
        Validator::addRule('salutation',   Validator::RULE_REQUIRED);
        Validator::addRule('firstname',    Validator::RULE_REQUIRED);
        Validator::addRule('lastname',     Validator::RULE_REQUIRED);
        Validator::addRule('street',       Validator::RULE_REQUIRED);
        Validator::addRule('zip',          Validator::RULE_REQUIRED);
        Validator::addRule('zip',          Validator::RULE_ZIP);
        Validator::addRule('city',         Validator::RULE_REQUIRED);
        Validator::addRule('email',        Validator::RULE_REQUIRED);
        Validator::addRule('email',        Validator::RULE_EMAIL);
        Validator::addRule('phone',        Validator::RULE_PHONE);
        Validator::addRule('shipping',     Validator::RULE_REQUIRED);

        // form was submitted
        if (isset($this->request['submit'])) {
            $data = array('data' => $this->request);

            if (Validator::validate($this->request)) {
                // valid -> show results
                $this->render('result', $data);
            } else {
                // form has errors -> show again
                $this->render('form', $data);
            }

        // show empty form
        } else {
            $this->render('form');
        }
    }
}