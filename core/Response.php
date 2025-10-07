<?php

declare(strict_types=1);

namespace App\core;

class Response {
    public function setResponseCode(int $code) {
        http_response_code($code);
    }
}