<?php

declare(strict_types=1);

namespace App\core;

class Router {

    protected array $routes = [];

    public function __construct
    (
        public Request $request,
        public Response $response
    )
    {}

    public function get(string $path, $callback) { 

        $this->routes['get'][$path] = $callback;

    }

    public function post(string $path, $callback) { 

        $this->routes['post'][$path] = $callback;

    }

    public function resolve() {

        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setResponseCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
            $method = $callback[1];
            return call_user_func([$callback[0], $method], $this->request); // $controller->$method
        }

        return call_user_func($callback);
    }

    
    public function renderView($view, $params = []) {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent() {

        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params) {

        foreach($params as $key => $value) {
            $$key = $value; // becomes $name = 'John';
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}