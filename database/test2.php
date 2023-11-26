<?php
require_once "database.php";
// /create_function
$dbo = new database();
$code='schol techer';
$t='st';
$cmd = "insert into programe_datalis (title,code) values(:titlex,:codey)";
$st = $dbo->conn->prepare($cmd);
try{
    $st->execute([":titlex"=>"$t","codey"=>"$code"]);

}
catch(Exception $ee){
echo($ee->getMessage()."<br>");
}
$cmd = "select * from dempernt_datalis";
$statment = $dbo->conn->prepare($cmd);
$statment->execute();
$rvlger = $statment->fetchAll(PDO::FETCH_ASSOC);
print_r($rvlger);



?>