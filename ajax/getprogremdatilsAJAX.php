<?php
$root = $_SERVER["DOCUMENT_ROOT"];
include_once $root . "/sms/database/database.php";
include_once $root . "/sms/database/programeDB.php";
include_once $root . "/sms/database/dabartmentDB.php";
$action= $_POST["action1"];
if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["action1"])) {
    $p = $_POST["a"];
    $q = $_POST["b"];
    $action = $_POST["action1"];

    if ($action == "getprogrammedtils") {
        $dbo = new database();
        $pdo = new programeDB();
        $result = $pdo->getAllprogrem($dbo);
        $rv = json_encode($result);
        echo $rv;
        exit();
    }

}

if($action == "getd"){
$dbo=new database();
$ddo=new debertmentDB();
$result= $ddo->getAlldebertment($dbo);
$rv=json_encode($result);
echo $rv;
exit();
}
//txtcode:txtcode,txttitle:txttitle,txtnos:txtnos,dd:dd,ddtg:ddtg,ddtl:ddtl, 
if($action == "saveprograme"){
$txtcode=$_POST['txtcode'];
$txttitle=$_POST['txttitle'];
$txtnos=$_POST['txtnos'];
$dd=$_POST['dd'];
$ddtg=$_POST['ddtg'];
$ddtl=$_POST['ddtl'];
$dbo=new database();
$pdo=new programeDB();
$pdo->createnew($dbo,$txtcode,$txttitle,$txtnos,$dd,$ddtg,$ddtl);
echo json_encode($rv);
exit();
}
//update
if($action == "update"){
    $txtcode=$_POST['txtcode'];
    $txttitle=$_POST['txttitle'];
    $txtnos=$_POST['txtnos'];
    $dd=$_POST['dd'];
    $ddtg=$_POST['ddtg'];
    $ddtl=$_POST['ddtl'];
    $pid=$_POST['pid'];
    $dbo=new database();
    $pdo=new programeDB();
    //   public function 
    //updateprogremdt($dbo,$pid,$title,$code,$nos,$gl,$tl,$did)
    $pdo->updateprogremdt($dbo,$pid,$txttitle,$txtcode,$txtnos,$ddtg,$ddtl,$dd);
   if($rv==1){
$rv=$pdo->getAllprogrem($dbo);
   }
$result=json_encode($rv);
echo $result;
    exit();}
?>
