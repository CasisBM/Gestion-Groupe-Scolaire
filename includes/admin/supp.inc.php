<?php
if (!isset($_GET['id']))
{
    header('Location:./index.php');
}
$idUser = $_GET['id'];
$requete = "DELETE FROM salles WHERE id_salle = '$idUser' ";

//var_dump($requete);
$requeteSupp = new Sql();
$requeteSupp->inserer($requete);
require "listeSalle.inc.php";
//header('Location:..//index.php?page=listSalle');