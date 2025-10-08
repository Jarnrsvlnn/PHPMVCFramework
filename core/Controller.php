<?php

declare(strict_types=1);

namespace App\core; 

class Controller {

    public string $layout = 'main';

    public function setLayout($layout) {
        $this->layout = $layout;
    }
    
    public function render($view, $params = []) {

        return Application::$app->router->renderView($view, $params);

    }
    
}