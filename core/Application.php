<?php

declare(strict_types=1);

namespace App\core;

class Application {

    public Router $router;

    public function __construct
    (
        public Request $request
    )
    {
        $this->router = new Router($this->request);
    }

    public function run() {

        echo $this->router->resolve();
    }

}