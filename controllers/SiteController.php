<?php

declare(strict_types=1);

namespace App\Controllers;

use App\core\Application;
use App\core;
use App\core\Controller;

class SiteController extends Controller {

    public function home() {
        $params = [
            'name' => 'John'
        ];

        return $this->render('home', $params);
    }
    
    public function contact(): string {
        return $this->render('contact');
    }

    public function handleContact(): string {
        
        return 'Handling Submitted Data';
    
    }

}