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
      $requete = "DELETE FROM eleves WHERE id_eleve = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listeEleve";
      echo redirection($url);
      break;

   case 'matiere':
      $requete = "DELETE FROM enseignants_has_matieres WHERE id_enseignant = '$idUser' AND id_matiere = ".$_GET['idMatiere'];
      $queryDelete->inserer($requete);
      $requete = "DELETE FROM eleves WHERE id_eleve = '$idUser' ";
      $queryDelete->inserer($requete);
      $url = "index.php?page=listeMatiere&idEnseignant= '$idUser' ";
      echo redirection($url);
      break;

   case 'etablissement':
      
      $requete = "UPDATE eleves SET id_promotion = null WHERE id_eleve = 
                  (SELECT id_eleve FROM promotions p join eleves el on 
                  el.id_promotion = p.id_promotion WHERE p.id_etablissement = '$idUser') ";
      $queryDelete->inserer($requete);

      $requete = "DELETE FROM cours WHERE id_planning in (SELECT c.id_planning FROM cours c join salles s 
                  on c.id_salle = s.id_salle 
                  join promotions p on c.id_promotion = p.id_promotion
                  where s.id_etablissement = '$idUser' or p.id_etablissement = '$idUser')";
      $queryDelete->inserer($requete);

      $requete = "UPDATE ETABLISSEMENTS_has_UTILISATEUR SET id_enseignant = null WHERE id_etablissement = $idUser ";
      $queryDelete->inserer($requete);

      $requete = "DELETE FROM salles WHERE id_etablissement = $idUser ";
      $queryDelete->inserer($requete);

      $requete = "DELETE FROM promotions WHERE id_etablissement = $idUser ";
      $queryDelete->inserer($requete);

      $requete = "DELETE FROM ETABLISSEMENTS_has_UTILISATEUR  WHERE id_etablissement = $idUser ";
      $queryDelete->inserer($requete);

      $requete = "DELETE FROM etablissements WHERE id_etablissement = '$idUser' ";
      $queryDelete->inserer($requete); 

      $url = "index.php?page=choixEtablissement"; 
      echo redirection($url);
      break;
}