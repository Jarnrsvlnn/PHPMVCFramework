<?php

declare(strict_types=1);

namespace App\core;

class Application {

    public static string $ROOT_DIR;
    public Router $router;
    public static Application $app; 
    public Controller $controller;

    public function __construct
    (
        public string $rootPath,
        public Request $request,
        public Response $response
    )
    {
        self::$ROOT_DIR = $rootPath;

        /**
         * The purpose of assigning the instance of this class to the static property
         * of the class itself is so that we only have 1 instance of this class
         * and we can access this class everywhere without instantiating over
         * and over again!
         */
        self::$app = $this; 
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {

        echo $this->router->resolve();
    }

    public function getController() {
        return $this->controller;
    }

    public function setController(Controller $controller) {
        $this->controller = $controller;
    }

}