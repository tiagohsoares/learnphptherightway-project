<?php

namespace App\Helpers;

class Helpers {

public function seperadorDollar(array $coluna) : array{
    $string = str_replace('$', '', $coluna);
    foreach($string as $valor){
        $valores[] = floatval($valor);
    }
    return $valores;
}

function formatarData(string $date): string{
    return $date('M j,Y', strtotime($date));
}

public function lerArquivos(string $x): array{
    foreach(scandir(STORAGE_PATH) as $files){
        $file[] = $files; 
    } $arquivo = array_search($x, $file);
     $files = [(STORAGE_PATH . $file[$arquivo])];
     return $files;
}

}