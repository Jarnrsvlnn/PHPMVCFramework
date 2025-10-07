<?php

declare(strict_types=1);

namespace App\core;

class Application {

    public function __construct
    (
        public Router $router
    )
    {
        /**
         * instantiate a new router object everytime this application
         * is instantiated 
         * */
        $this->router = new Router(); 
    }

    public function run() {
        $this->router->resolve();
    }
}