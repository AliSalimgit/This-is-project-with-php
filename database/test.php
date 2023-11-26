<?php
require_once "database.php";
//crate an obj to maje con to the database
$dbo=new database();
//hoe to execute sql comands 
//a. write str version of comds 
$cmd="select * from programe_datalis";
//b. create prepared stetment 
$statement = $dbo->conn->prepare($cmd);
$statement->execute();
//d.wiew the ruselt
$rv = $statement->fetchAll(PDO::FETCH_ASSOC);
//cler ruselt
print_r($rv);

?>