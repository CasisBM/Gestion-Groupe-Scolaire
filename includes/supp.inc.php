<?php
if (!isset($_GET['id']))
{
    header('Location:./index.php');
}
$idUser = $_GET['id'];
$page = $_GET['pg'];

$requeteSupp = new Sql();

switch($page)
{
     case 'salle':
        $requete = "DELETE FROM salles WHERE id_salle = '$idUser' ";
        $requeteSupp->inserer($requete);
        require "listeSalle.inc.php";        
        break;
     case 'promo':
        $requete = "DELETE FROM promotions WHERE id_promotion = '$idUser' ";
        $requeteSupp->inserer($requete);
        require "listePromotion.inc.php";
        break;

}

//var_dump($requete);

//header('Location:..//index.php?page=listSalle');