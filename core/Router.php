<?php

declare(strict_types=1);

namespace App\core;

class Router {

    protected array $routes = [];

    public function __construct
    (
        public Request $request
    )
    {}

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

    public function renderView($view) {
        include_once __DIR__ . "/../views/$view.php"; 
    }

    /**
     * Determines the current path requested by the user and the current method
     * and takes the corresponding callback from the routes array.
     */

    public function resolve() {

        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return 'Server Not Found';
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }
}