<?php

namespace TiloBaller\Mvc\Controller;

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

    public function testAction() {
        $post = new \TiloBaller\Mvc\Domain\Model\PostModel();
        $post->setAuthor('Tilo Baller');
        $post->setDate(time());
        $post->setTitle('Erster Post');
        $post->setAbstract('Lorem ipsum dolor sit amet');
        $post->setBody('foo');

        $postRepository = new \TiloBaller\Mvc\Domain\Repository\PostRepository();
        $result = $postRepository->add($post);

        echo '<pre>';
        var_dump($result);
        echo '</pre>';


        $result->setAuthor('Tim Tester');
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
        $result2 = $postRepository->update($result);

        echo '<pre>';
        var_dump($result2);
        echo '</pre>';


        $postRepository->remove($result);
        echo '<pre>';
        var_dump($postRepository->getAll());
        echo '</pre>';
    }
}