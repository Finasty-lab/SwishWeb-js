<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Morpion</title>
    <script src="js.js"></script>
    <link rel="icon" href="test.ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css.css">
</head>

<h1>Morpion</h1>
<body>
<button id="buttons" type="button" class="btn btn-primary btn-lg">Réinitialiser  / Creer partie</button>

<form method="post">
    <input name="rejoindre">
    <button type="submit" class="btn btn-secondary btn-lg">Rejoindre partie</button>
</form>
<?php
require_once("MaDB.php");
session_start();
if(!isset($idpartie)){
    $idpartie = $_SESSION['idpartie'];
}
echo "<h2 id='ids'>Identifiant partie : <strong>$idpartie</strong></h2>";
?>



<form method="post">
    <input  type="text" name="forme" required="required" placeholder="Mettre X ou O" maxlength="1">
    <input type="number" name="case" required="required" placeholder="Emplacement (1-9)" maxlength="1">
    <button type="submit" class="btn btn-success">Inserer</button>
</form>

<script>
    $(document).ready(function(){
        setInterval(function(){
            $("#screen").load('ActualiserMorpion.php')
        }, 500);
        setInterval(function(){
            $("#ids").load('ActualiserIDPartie.php')
        }, 500);
    });
</script>

<div id="screen"></div>
<script>
    $(document).ready(function(){
        $("#buttons").click(function(){

            $("#div1").load('SupprimerPartieActuelEtCreer.php')

        });
    });
</script>






<script>
    function myFunction() {

        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");

    }
</script>
<div id="div1"></div>
<br>
<button id="supp" type="button" class="btn btn-danger">Supprimer partie</button>
<script>
    $(document).ready(function(){
        $("#supp").click(function(){

            $("#ids").load('SupprimerPartieActuelle.php')

        });
    });
</script>
</body>
<?php
$db = new MyDB();
$colonne="";
if(isset($_POST['rejoindre'])){
    $_SESSION['idpartie']=$_POST['rejoindre'];
}

if(isset($_POST['case'])){

    if($_POST['case']=='1'){
    $colonne='un';
}
elseif ($_POST['case']=='2'){
    $colonne='deux';
}
elseif ($_POST['case']=='3'){
    $colonne='trois';
}
elseif ($_POST['case']=='4'){
    $colonne='quatre';
}
elseif ($_POST['case']=='5'){
    $colonne='cinq';
}
elseif ($_POST['case']=='6'){
    $colonne='six';
}
elseif ($_POST['case']=='7'){
    $colonne='sept';
}
elseif ($_POST['case']=='8'){
    $colonne='huit';
}
elseif ($_POST['case']=='9'){
    $colonne='neuf';
}
    else{
        $colonne='null';
    }
}
$valeur="";
if(isset($_POST['forme'])){
    $valeur=$_POST['forme'];
}


if(isset($colonne)and $valeur!="" and $colonne!=''){

    $aff=$db->query('SELECT "'.$colonne.'" FROM partie where Id="'.$idpartie.'" ');
    $res = $aff->fetchArray();

    if(strlen($res[$colonne])!=0){
        echo " <p> Insertion impossible une valeur est déjà à l'intérieur</p> <br>";
    }
    else{
        $update = $db->query('UPDATE partie SET "'.$colonne.'" = "'.$valeur.'" where Id="'.$idpartie.'" ');
    }

}