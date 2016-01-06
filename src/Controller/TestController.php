<?php

namespace TiloBaller\Controller;

class TestController extends AbstractController {

    public function init() {
        $foo = "bar";
        $this->render('test', array('foo' => $foo, 'xxx' => array('a', 'b', 'c')));
    }
}