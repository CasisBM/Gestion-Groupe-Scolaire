<?php

//var_dump(isset($_POST['frmcheche']));

if (!isset($_POST['frmcheche'])) 
     {  
         include './includes/listeEleve.inc.php';
        //echo $message;
    } else {
   

    $nom = htmlentities(trim($_POST['nom']));
    $keyword = '%'.$nom.'%';
   
    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de l'éleve");
    };
    
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/listeEleve.inc.php';
    } else {
      require './includes/header.php';


$sqlQuery = new Sql();
$requete = "SELECT el.id_eleve, el.prenom, el.nom, et.nom_etablissement, p.nom_promotion FROM eleves el JOIN promotions p 
            ON el.id_promotion = p.id_promotion 
            JOIN etablissements et ON et.id_etablissement = p.id_etablissement" ;

if(!empty($_SESSION['etablissement']))
{
  $requete .= " where p.id_etablissement = ".$_SESSION['etablissement'];
  $requete .= " and (el.nom like '$keyword' or el.prenom like '$keyword');";
}else $requete .= " where el.nom like '$keyword' or el.prenom like '$keyword';";

$tblQuery = $sqlQuery->lister($requete);
?>

            <!--/Table Liste Eleves-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="6">Liste des eleves</th>
                </tr>
                <tr>
                  <th colspan="6">
                    <div class="search">
                    <form action="index.php?page=chercheEleve" method="POST">
                      <div class="search-box">
                      <?php  if (count($tblQuery)) { ?> 
                         <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                         <?php   } else { ?>
                            <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                            </div><i>il n'y pas de éleve <?=$nom ?></i>
                <?php   }     ?>
                      </div>
                      <input type="hidden" name="frmcheche" />
          </form>
                  </th>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Prenom NOM</th>
                <th>Promotions</th>
                <th>Voir profil</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i <count($tblQuery) ; $i++) { ?>
              <tr>
                <td><?=$tblQuery[$i]['prenom']?><?=' '?><?=$tblQuery[$i]['nom']?></td>
                <td><?=$tblQuery[$i]['nom_promotion']?></td>
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="planningprof.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td><?=$tblQuery[$i]['nom_etablissement'] ?></td>
                <td>
                  <a href="index.php?page=updateEleve&idEleve=<?= $tblQuery[$i]['id_eleve'] ?>"><i class="fa-solid fa-pen"></i></a>
                  <a href="index.php?page=supprimer&table=eleves&id=<?= $tblQuery[$i]['id_eleve'] ?>" 
                  onclick="return confirm('Etes vous certain de supprimer cette salle ?')"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
             
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="6">
                  <div class="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button class="buttonTable" onclick="location.href='index.php?page=ajouterEleve'" type="button"> Ajouter un eleve </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
            <?php
        // require "listeEleve.php";
    }

} 

?>