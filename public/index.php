<?php

declare(strict_types = 1);


$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */
require APP_PATH . 'app.php';

$files = lerArquivos('sample_1.csv');

$transações = [];
foreach ($files as $file){
    $transações = array_merge ($transações, abrirArquivo($file));
}


$datas = (extrairColuna(0, $transações));
$check = (extrairColuna(1, $transações));
$descrição = (extrairColuna(2, $transações));
$quantidade = (extrairColuna(3, $transações));

$valor = seperadorDollar($quantidade);

foreach ($valor as $num){
    if($num >= 0){
        $ganho[] = $num;
    } else {
        $perda[] = $num ;
    }
}

$income =  array_sum($ganho);
$outcome = array_sum($perda);
$receita = $income + $outcome;

include (VIEWS_PATH . 'transactions.php');


