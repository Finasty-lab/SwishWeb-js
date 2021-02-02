<?php
session_start();
require_once("MaDB.php");
$db = new MyDB();

$id=$_SESSION['idpartie'];
$requete ="DELETE FROM partie where Id='".$id."'";
$suppression = $db->query($requete);

$newid=genererChaineAleatoire(10);
$_SESSION['idpartie']=$newid;
$db->query('INSERT INTO partie(Id) VALUES("'.$newid.'")');