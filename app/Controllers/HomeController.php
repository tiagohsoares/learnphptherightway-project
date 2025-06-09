<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public static function index(): View
    {
        return View::make('index');
    }

    public static function upload(): View
    {
        return View::make('upload');
    }

    public function store()
    {
        $amount = $_POST['receipt'];

        var_dump($amount);
    }
}