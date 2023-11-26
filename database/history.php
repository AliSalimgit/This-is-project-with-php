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
            FROM programe_datalis as pd, dempernt_datalis as dd
            WHERE pd.dempernt_id = dd.id"; // Use a single equal sign here
        $statement = $dbo->conn->prepare($cmd);
        $statement->execute();
        $rv = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rv;
    }


    $rv =$pdo->getAllprogrem($dbo);
print_r($rv);
echo("<br>");
$rv =$pdo->createnew($dbo,"ece","ali",4,"ug","ss",6);
echo($rv);
echo("<br>");
$rv =$pdo->getAllprogrem($dbo);
print_r($rv);

$rv =$pdo->getAllprogrem($dbo);
print_r($rv);
echo("<br>");
$rv =$pdo->createnew($dbo,"ece","ali",4,"ug","ss",6);
echo($rv);
echo("<br>");
$rv =$pdo->getAllprogrem($dbo);
print_r($rv);


let x=`<table>
<thead>
<th>serel</th>
<th>code</th>
<th>title</th>
<th>debertment</th>
</thead>
<tbody>
<tr>
<td>1</td>
<td>csb</td>
<td>batch in cse</td>
<td>ses</td>
</tr>
</tbody>
</table>`;
