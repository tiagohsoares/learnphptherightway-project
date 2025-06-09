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
        return View::make('index');
    }

    public static function upload(): View
    {
        $invoices = new TransactionController;
        $invoices->lerArquivos($_FILES('receipt'));
    
        $transações = [];
        foreach ($invoices as $file){
            $transações = array_merge ($transações, $invoices->abrirArquivo($file));
        }
        return View::make('upload');
    }

}