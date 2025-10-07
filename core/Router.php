<?php

declare(strict_types=1);

namespace App\core;

class Router {

    protected array $routes = [];

    /**
     * Gets the routes and then stores in the array property routes each as an associative array
     */

    public function get(string $path, $callback) { 

        /**
         * generates or saves the routes as associative array inside an another
         * associative array called get, and the other one is called post.
         */

        $this->routes['get'][$path] = $callback;

    }

    public function post() {
        // todo
    }

    /**
     * Determines the current path requested by the user and the current method
     * and takes the corresponding callback from the routes array.
     */

    public function resolve() {
        
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
    }
}