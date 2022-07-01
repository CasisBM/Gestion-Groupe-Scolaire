<?php
if (!isset($_GET['id']))
{
    header('Location:./index.php');
}
$idUser = $_GET['id'];
$page = $_GET['pg'];

$requeteSupp = new Sql();
//var_dump($idUser);
switch($page)
{
     case 'salle':
        $requete = "DELETE FROM salles WHERE id_salle = '$idUser' ";
        $requeteSupp->inserer($requete);
        require "listeSalle.inc.php";        
        break;
     case 'promo':
        $requete = "DELETE FROM promotions WHERE id_promotion = '$idUser' ";
       
        $requeteSupp->inserer($requete);  //on ne peux pas delete promotion si les autre table utiliser ce prom
        require "listePromotion.inc.php";
        break;
     case 'prof':
      $requete = "DELETE FROM enseignants WHERE id_enseignant = '$idUser' ";
      //$requeteSupp->inserer($requete);  //on ne peux pas delete prof si les autre table utiliser ce prof
      require "listeProfesseur.inc.php";
         break;

}

//var_dump($requete);

//header('Location:..//index.php?page=listSalle');