<?php
require_once("MaDB.php");
session_start();
$db = new MyDB();
$id=$_SESSION['idpartie'];

$requete ="DELETE FROM partie where Id='".$id."'";
$suppression = $db->query($requete);


