<?php

declare(strict_types=1);

namespace App\Controllers;

use App\core\Application;
use App\core;
use App\core\Controller;
use App\core\Request;

class SiteController extends Controller {

    public function home() {
        $params = [
            'name' => 'John'
        ];

        return $this->render('home', $params);
    }
    
    public function contact() {
        return $this->render('contact');
    }

    public function handleContact(Request $request): string {
        $contactData = $request->getData();

        echo '<pre>';
        var_dump($contactData);
        echo '</pre>';
        exit;

        return 'Handling Submitted Data';
    
    }

}