<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Application;
use App\core\Request;
use App\core\Response;

$application = new Application(dirname(__DIR__), new Request(), new Response());

$application->router->get('/home', 'home');

$application->router->get('/contact', 'contact');

$application->run();