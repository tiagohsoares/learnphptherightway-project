<?php

declare(strict_types = 1);

namespace App\Controllers;

class TransactionController


{

public array $transações;
public array $total; 

public function getTransaction (){
    $_FILES['receipt'] = $file;
}

public function lerArquivos(string $x): array{
    foreach(scandir(STORAGE_PATH) as $files){
        $file[] = $files; 
    } $arquivo = array_search($x, $file);
     $files = [(STORAGE_PATH . $file[$arquivo])];
     return $files;
}

function abrirArquivo(string $filename): array {
    //Declarar Array com as transacoes do arquivo .csv
    $transações = [];
    // Abrir arquivo .csv
    $file = fopen($filename, 'r');
    //Descartar a primeira linha contendo os titulos 
    fgetcsv($file, separator: ',', enclosure: '"', escape: "");
    
    while(($transação = fgetcsv($file, separator: ',', enclosure: '"', escape: "")) !== false) {
        $transações[] = $transação; 
    }
    return $transações;
}

}
