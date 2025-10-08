<?php

declare(strict_types=1);

namespace App\Controllers;

use App\core\Controller;
use App\core\Request;

class AuthController extends Controller {

    public function login() {

        $this->setLayout('auth');
        return $this->render('login');

    }

    public function register(Request $request) {
        
        if ($request->isPost()) {

            return 'Handle Submitted Data';

        }

        $this->setLayout('auth');
        return $this->render('register');
        
    }
}