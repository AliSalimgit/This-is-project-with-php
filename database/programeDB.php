<?php
require_once "database.php";

class programeDB {
    public function getAllprogrem($dbo) {
        $cmd = "SELECT
            pd.id as pid,
            pd.code as pcode,
            pd.title as ptitle,
            pd.gradchen_level as gl,
            pd.techncel_level as tl,
            pd.dempernt_id as did,
            pd.no_of_sem as nos,
            dd.title as dtitle,
            dd.code as dcode
            FROM programe_datalis
             as pd, dempernt_datalis as dd
            WHERE pd.dempernt_id = dd.id";
        $statement = $dbo->conn->prepare($cmd);
        $statement->execute();
        $rv = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rv;
    }

    public function createnew($dbo, $code, $title, $nos, $gl, $tl, $did) {
        $cmd = "INSERT INTO programe_datalis (title, code, no_of_sem, gradchen_level, techncel_level, dempernt_id)
                VALUES (:title, :code, :no_of_sem, :gradchen_level, :techncel_level, :dempernt_id)";
        $statement = $dbo->conn->prepare($cmd);
        
        try {
         
            $statement->execute([
                ":title" => $title,
                ":code" => $code,
                ":no_of_sem" => $nos,
                ":gradchen_level" => $gl,
                ":techncel_level" => $tl, 
                ":dempernt_id" => $did,
            ]);
            return 1;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return 0;
        }
        

    }
    public function getprogremmedatalbycode ($dbo,$code){
        $cmd = "SELECT
        pd.id as pid,
        pd.code as pcode,
        pd.title as ptitle,
        pd.gradchen_level as gl,
        pd.techncel_level as tl,
        pd.dempernt_id as did,
        pd.no_of_sem as nos,
        dd.title as dtitle,
        dd.code as dcode
        FROM programe_datalis as pd, dempernt_datalis as dd
        WHERE pd.dempernt_id=dd.id
        and pd.code=:code";$statement = $dbo->conn->prepare($cmd);$statement->execute([":code"=>$code]);$rv = $statement->fetchAll(PDO::FETCH_ASSOC);return $rv;
    }
    public function getprogremmedatalbyid ($dbo,$id){
        $cmd = "SELECT
        pd.id as pid,
        pd.code as pcode,
        pd.title as ptitle,
        pd.gradchen_level as gl,
        pd.techncel_level as tl,
        pd.dempernt_id as did,
        pd.no_of_sem as nos,
        dd.title as dtitle,
        dd.code as dcode
        FROM programe_datalis as pd, dempernt_datalis as dd
        WHERE pd.dempernt_id=dd.id
        and pd.id=:id";$statement = $dbo->conn->prepare($cmd);$statement->execute([":id"=>$id]);$rv = $statement->fetchAll(PDO::FETCH_ASSOC);return $rv;
    }
    public function updateprogremdt($dbo,$pid,$title,$code,$nos,$gl,$tl,$did)
    {
$cmd="UPDATE programe_datalis SET 
code=:code,
title=:title,
no_of_sem=:no_of_sem,
gradchen_level=:gradchen_level,
techncel_level=:techncel_level,
dempernt_id=:dempernt_id,
WHERE id=:id";
$statmetnt=$dbo->conn->prepare($cmd);
try{
$statmetnt->execute([
    ":code"=>$code,
    ":title"=>$title,
    ":no_of_sem"=>$nos,
    ":gradchen_level"=>$gl,
    ":techncel_level"=>$tl,
    ":dempernt_id"=>$did,
    ":id"=>$pid,]);
    return 1;
}
catch(Exception $ee){
return 0;
}
    }
    
}
?>
