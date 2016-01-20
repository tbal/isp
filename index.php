<?php

require __DIR__ . '/vendor/autoload.php';


// Loads configuration settings from .env file in project root.
$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();
$dotenv->required(array('DB_HOST', 'DB_USER', 'DB_NAME'))->notEmpty();
$dotenv->required('DB_PASS');


// quickfix if timezone is not set
if (!ini_get('date.timezone')) {
    ini_set('date.timezone', 'Europe/Berlin');
}


new \TiloBaller\Application();