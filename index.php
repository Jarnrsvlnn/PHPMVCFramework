<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\core\Application;
use App\core\Router;

$application = new Application(new Router);

$application->router->get('/', function() {
    return 'Hello World';
});

$application->router->get('/contact', function() {
    return 'Contact';
});

$application->run();
