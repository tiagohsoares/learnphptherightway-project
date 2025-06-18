<?php

namespace App\Helpers;

use App\View;

class Helper {

public static function formatarData(string $date): string{
    return date('M j,Y', strtotime($date));
    }
    public function extrairColuna(string $id, array $array): array{
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

}