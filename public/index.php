<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Application;
use App\core\Request;

$application = new Application(new Request());

$application->router->get('/home', function() {
    return 'Hello World';
});

$application->router->get('/contact', 'contact');

$application->run();