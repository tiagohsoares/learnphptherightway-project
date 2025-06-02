<?php

declare(strict_types = 1);

// Your Code

$file = [];

//Ler a pasta das transacoes e retornar o arquivo
function lerArquivos(string $x): array{
    foreach(scandir(FILES_PATH) as $files){
        $file[] = $files; 
    } $arquivo = array_search($x, $file);
     $files = [(FILES_PATH . $file[$arquivo])];
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

function extrairColuna(int $id, array $array): array{
    // Coluna a ser extraida pelo array 
    // Cada key corresponde a uma coluna especifica 0 =data
    // Array com a coluna
    $coluna = [];
    if(!empty($array)){
        foreach($array as $transação){
            $coluna[] = $transação[$id];
        }
    }
    return $coluna;
}

function seperadorDollar(array $coluna) : array{
    $string = str_replace('$', '', $coluna);
    foreach($string as $valor){
        $valores[] = floatval($valor);
    }
    return $valores;
}

function formatarData(string $date): string{
    return date('M j,Y',strtotime($date));
}