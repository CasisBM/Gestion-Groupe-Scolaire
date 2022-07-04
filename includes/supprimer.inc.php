<?php
if (!isset($_GET['id'])) {
   header('Location:./index.php');
}
$idUser = $_GET['id'];
$page = $_GET['table'];

$queryDelete = new Sql();

switch ($page) {

   case 'salles':
      $requete = "DELETE FROM salles WHERE id_salle = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listeSalle";
      echo redirection($url);
      break;

   case 'promotions':
      $requete = "UPDATE eleves SET id_promotion = null WHERE id_promotion = '$idUser' ";
      $queryDelete->inserer($requete);
      $requete = "DELETE FROM promotions WHERE id_promotion = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listePromotion";
      echo redirection($url);
      break;

   case 'enseignants':
      $requete = "DELETE FROM enseignants WHERE id_enseignant = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listeProfesseur";
      echo redirection($url);
      break;

   case 'eleves':
      $requete = "DELETE FROM eleves WHERE id_enseignant = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listeEleve";
      echo redirection($url);
      break;
}