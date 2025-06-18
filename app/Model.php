<?php

declare(strict_types = 1);

namespace App;

abstract class Model
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }

    public function getTransactions(): array 
    {
        $stmt = $this->db->prepare("SELECT * FROM 'transacao' ORDER BY id" );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add(array $transação): void {
        $stmt = $this->db->prepare("INSERT INTO FROM 'transacao' VALUES (:data,:check,:description,:valor");
        $stmt->bindParam(':check', $check, \PDO::PARAM_INT);
    }
}
