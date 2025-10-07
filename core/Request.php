<?php

declare(strict_types=1);

namespace App\core;

class Request {

    /**
     * this get() method basically gets the path url or the REQUEST_URI from the
     * SPG $_SERVER and basically just returns the formatted path if any query strings
     * exists or just the original passed path itself if not found any
     */

    public function getPath() {

        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return explode('?', $path)[0];
    }

    /**
     * gets the request method, and return whether if 
     * its a GET request or a POST request
     */

    public function getMethod() {

        return strtolower($_SERVER['REQUEST_METHOD']);

    }
}
