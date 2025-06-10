<?php

namespace App\Helpers;

class Helpers {

public function extrairColuna(int $id, array $array): array{
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

public function seperadorDollar(array $coluna) : array{
    $string = str_replace('$', '', $coluna);
    foreach($string as $valor){
        $valores[] = floatval($valor);
    }
    return $valores;
}

function formatarData(string $date): string{
    return date('M j,Y', strtotime($date));
}

}