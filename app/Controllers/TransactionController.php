<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Helpers;
use App\Helpers\Helpers as HelpersHelpers;

class TransactionController

{
private array $transactions;

public function getTransaction(){
    $file =  $_FILES['receipt']['tmp_name'];
    $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . $_FILES['receipt']['name'][0];
    move_uploaded_file($file[0], $filePath);
    return $this->transactions = $this->abrirArquivo($filePath);
}

function abrirArquivo(string $filename): array {
    // Abrir arquivo .csv
    $file = fopen($filename, 'r');
    //Descartar a primeira linha contendo os titulos 
    fgetcsv($file, separator: ',', enclosure: '"', escape: "");
    
    while(($transação = fgetcsv($file, separator: ',', enclosure: '"', escape: "")) !== false) {
        $transações[] = $transação; 
        $transação = $this->extrairTransacao($transação);
    }
    return $transações;
}

public function extrairTransacao(array $array): array{
    // Coluna a ser extraida pelo array 
    // Cada key corresponde a uma coluna especifica 0 =data
    // Array com a coluna
    [$data, $check, $descricao, $valor] = $array;

    $valor = str_replace(['$', ','], '', $valor);

    return [
        'transacaoData' => $data,
        'checkId' => $check,
        '$descricao' => $descricao,
        'valor' => $valor
    ];
}
}
