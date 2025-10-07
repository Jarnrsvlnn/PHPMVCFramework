<?php

declare(strict_types=1);

namespace App\core;

class Application {

    public static string $ROOT_DIR;
    public Router $router;
    public static Application $app;

    public function __construct
    (
        public string $rootPath,
        public Request $request,
        public Response $response
    )
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {

        echo $this->router->resolve();
    }

}