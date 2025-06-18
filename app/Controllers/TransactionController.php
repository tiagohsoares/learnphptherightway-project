<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Helpers\Helper;

class TransactionController

{
public array $transactions;
public array $totals;

public function getTransaction(): array{
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
      //  $transações[0] = Helper::formatarData($transação[0]);
        $transações[] = $transação;
        $this->totals[] = $this->extrairTransacao($transação);
    }
    return $transações;

}

public function extrairTransacao(array $array): array{
    // Coluna a ser extraida pelo array 
    // Cada key corresponde a uma coluna especifica 0 =data
    // Array com a coluna
    [$data, $check, $descricao, $valor] = $array;

  //  if(!empty($this->transactions)){
  //      foreach($this->transactions as $transação){
   //         $transaction 
   //     }
   // }
    //String para float
    $valor = (float) str_replace(['$', ','], '', $valor);

    return [
        'transacaoData' => $data,
        'checkId' => $check,
        'descricao' => $descricao,
        'valor' => $valor
    ];
}
}
