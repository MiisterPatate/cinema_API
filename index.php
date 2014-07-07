<?php

    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();

    $app = new \Slim\Slim();

    $app->get('/users/:username', function ($username) {
        echo "Hello, ".$username;
    });

    $app->run();