<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Controllers\TransactionController;

class HomeController
{
    public $invoices;

    public static function index(): View
    {
        session_start();
        return View::make('index');
    }

 public static function upload(): View
    {
        $invoices = new TransactionController;
        return View::make('transactions');
    }

}