<?php
require_once "database.php";

class debertmentDB {
    public function getAlldebertment($dbo) {
        $cmd = "SELECT
        dd.id as did,
        dd.title as dtitle,
        dd.code as dcode
        FROM 
        dempernt_datalis as dd";
        $statement = $dbo->conn->prepare($cmd);
        $statement->execute();
        $rv = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rv;
    }}



?>