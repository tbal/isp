<?php

require_once(__DIR__ . '/src/lib/FormHelper.php');
require_once(__DIR__ . '/src/lib/Validator.php');
require_once(__DIR__ . '/src/controller/AbstractController.php');
require_once(__DIR__ . '/src/controller/IndexController.php');

(new IndexController())->init();