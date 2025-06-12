<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Controllers\TransactionController;

class HomeController
{
    public array $transactions;

    public function index(): View
    {
        session_start();
        return View::make('index');
    }

    public function upload(): View
    {
        session_start();
        $invoices = new TransactionController;
        $this->transactions = $invoices->getTransaction();
        return View::make('transactions', [
            'transactions' => $this->transactions,
        ]);
    }

}