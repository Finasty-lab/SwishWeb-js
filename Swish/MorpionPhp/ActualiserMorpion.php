<?php

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mysqlitedb.db');
    }
}



session_start();
$idpartie = $_SESSION['idpartie'];
$db = new MyDB();

$rows = $db->query('SELECT COUNT(*) as count FROM partie where Id="'.$idpartie.'" ');
$row = $rows->fetchArray();
$numRows = $row['count'];

$afficher = $db->query('SELECT * FROM partie where Id="'.$idpartie.'" ');
while ($row = $afficher->fetchArray()) {

$un=$row['un'];
$deux=$row['deux'];
$trois=$row['trois'];
$quatre=$row['quatre'];
$cinq=$row['cinq'];
$six=$row['six'];
$sept=$row['sept'];
$huit=$row['huit'];
$neuf=$row['neuf'];


}
if($numRows!=1){
    echo "<h1>Identifiant inconnu<h1>";
}
else{
    echo "
<table>
    <tr>
        <td>$un</td>
        <td>$deux</td>
        <td>$trois</td>
    </tr>
    <tr>
        <td>$quatre</td>
        <td>$cinq</td>
        <td>$six</td>
    </tr>
    <tr>
        <td>$sept</td>
        <td>$huit</td>
        <td>$neuf</td>
    </tr>
</table>

";
}


?>
