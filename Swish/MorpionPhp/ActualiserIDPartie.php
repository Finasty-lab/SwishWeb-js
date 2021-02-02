<?php
session_start();
$idparte =$_SESSION['idpartie'];
echo "<h2 id='ids'>Identifiant partie : <strong>$idparte</strong> <button onclick='myFunction()' type='button' class='btn btn-dark'>Copier Id</button></h2>" ;
echo "<input type='text' class='myInput' value='$idparte' id='myInput'>";
?>

