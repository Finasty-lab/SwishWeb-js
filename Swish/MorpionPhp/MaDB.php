<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mysqlitedb.db');
    }
}

function genererChaineAleatoire($longueur = 10)
{
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAleatoire = '';
    for ($i = 0; $i < $longueur; $i++)
    {
        $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }
    return $chaineAleatoire;
}

function CreerPatie(string $bd,string $id){
    $id=genererChaineAleatoire();
    $bd->query('INSERT INTO partie(Id) VALUES("'.$id.'")');
}

function SupprimerLigne(string $bd,string $id){
    $suppression = $bd->query('DELETE FROM partie where Id="'.$id.'" ');
}
