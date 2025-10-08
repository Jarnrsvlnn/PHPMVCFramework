<?php

declare(strict_types=1);

namespace App\core;

class Request {

    public function getPath() {

        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return explode('?', $path)[0];
    }

    public function getMethod() {

        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function isGet() {

        return $this->getMethod() === 'get';

    }

    public function isPost() {

        return $this->getMethod() === 'post';
        
    }

    public function getData() {
        
        $data = [];

        if ($this->getMethod() === 'get') {
            foreach($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'post') {
            foreach($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $data;
    }
}
