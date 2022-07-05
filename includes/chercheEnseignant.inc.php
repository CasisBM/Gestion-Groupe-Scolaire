<?php


 if (!isset($_POST['frmcheche'])) 
     {  
         include './includes/listeEnseignant.inc.php';
        //echo $message;
    } else {
   

    $nom = htmlentities(trim($_POST['nom']));
    $keyword = '%'.$nom.'%';
   
    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de le professeur!");
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
        include './includes/listeEnseignant.inc.php';
    } else {

      require './includes/header.php';  
     

$sqlQuery = new Sql();
$requete = "select id_enseignant,prenom,nom from enseignants where prenom like '$keyword' or nom like '$keyword'";

$tblQuery = $sqlQuery->lister($requete);


?>
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="5">Liste des enseignants</th>
                </tr>
                <tr>
                  <th colspan="5">
                    <div class="search">
                    <form action="index.php?page=chercheEnseignant" method="POST">
                      <div class="search-box">
                      <?php  if (count($tblQuery)) { ?> 
                         <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                         <?php   } else { ?>
                          <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                         </div><i>il n'y pas de salle <?=$nom ?></i>
                <?php   }     ?>
                      <input type="hidden" name="frmcheche" />
          </form>
                  </th>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Prenom NOM</th>
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
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>
                <a href="index.php?page=listeEtablissement&idProf=<?=$tblQuery[$i]['id_enseignant'] ?>">
                    <i class="fa-solid fa-school-flag fa-2x"></i>
                  </a></td>
                <td>
                <a href="index.php?page=updateEnseignant&idEnseignant=<?= $tblQuery[$i]['id_enseignant'] ?>"><i class="fa-solid fa-pen"></i></a>
                <a href="index.php?page=supprimer&table=enseignants&id=<?= $tblQuery[$i]['id_enseignant'] ?>" onclick="return confirm('Voulez vous vraiment supprimer ce prof?')"><i class="fa-solid fa-trash"></i></a> 
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
                  <button class="buttonTable" onclick="location.href='index.php?page=ajouterEnseignant'" type="button"> Ajouter un enseignant </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

            <?php
        // require "listeEnseignant.inc.php";
    }

} 


//   displayMessage("!");
?>