<?php
require_once "database.php";
require_once "programeDB.php";
require_once "dabartmentDB.php";
$dbo =new database();
//$pdo=new programeDB();
$ddo=new debertmentDB();

// $rv = $pdo->getprogremmedatalbyid($dbo,1);
// print_r($rv);
// echo("<br>");
// $rv = $pdo->updateprogremdt($dbo, 2, "catjkh", "FRT", 44, "f", "z", 6);
// print_r($rv);
// echo("<br>");

// $rv = $pdo->getprogremmedatalbyid($dbo,1);
// print_r($rv);
$rv = $ddo->getAlldebertment($dbo);
print_r($rv);
?>