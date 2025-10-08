<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\SiteController;
use App\core\Application;
use App\core\Request;
use App\core\Response;

$application = new Application(dirname(__DIR__), new Request(), new Response());

$application->router->get('/', [SiteController::class, 'home']);

$application->router->get('/contact', [SiteController::class, 'contact']);

$application->router->post('/contact', [SiteController::class, 'handleContact']);

$application->run();    