<?php

//var_dump(isset($_POST['frmcheche']));

if (!isset($_POST['frmcheche'])) 
     {  
         include './includes/listeSalle.inc.php';
        //echo $message;
    } else {
   

    $nom = htmlentities(trim($_POST['sallename']));
    $keyword = '%'.$nom.'%';
   
    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de la salle");
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
        include './includes/listeSalle.inc.php';
    } else {
      require './includes/header.php';
        $requete = "select * from salles ";
        $requete = "select s.id_salle,s.nom_salle,s.caracteristique,e.nom_etablissement,e.ville from salles s join etablissements e on s.id_etablissement = e.id_etablissement where s.nom_salle like '$keyword';" ;
    //var_dump($requete);
         $sqlQuery = new Sql();
         $tblQuery = array();
         $tblQuery=$sqlQuery->lister($requete);  
         
         ?>
         

<!--/Table Liste Salle-->
<table>
  <thead>
    <tr>
      <th id="nomTable" colspan="5">Liste des salles</th>
    </tr>
    <tr>
      <th colspan="5">
        <div class="search">
          <form action="index.php?page=cherche" method="POST">
          <div class="search-box">
            <?php  if (count($tblQuery)) { ?> 
                    
                    <input type="text" name="sallename" id="sallename" class="search-input" placeholder="Recherche..">
                    <i class="fas fa-search search-button"></i>
              <?php   } else { ?>
                <input type="text" name="sallename" id="sallename" class="search-input" placeholder="il n'y pas de salle <?=$nom ?>">
                    <i class="fas fa-search search-button"></i>

                </div><i>il n'y pas de salle <?=$nom ?></i>
                <?php   }     ?>
        <input type="hidden" name="frmcheche" />
        </form>
      </th>
    </tr>

    </div>
    <tr id="titreTable">
      <th>Salles</th>
      <th>Caracteristique</th>
      <th>Voir planning</th>
      <th>Ecoles</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($tblQuery); $i++) { ?>

      <td><?= $tblQuery[$i]['nom_salle'] ?></td>
      <td><?= $tblQuery[$i]['caracteristique'] ?></td>
      <td>
        <form action="" method="$_POST">
        <a href="index.php?page=planningesalle">
          <i name="submit" id="submit" class="fa-solid fa-calendar-days fa-2x"></i>
          </form>
        </a>
      </td>
      <td><?=$tblQuery[$i]['ville'] ?></td>
      <td>
        <a href="index.php?page=editSalle&id=<?= $tblQuery[$i]['id_salle'] ?>" ><i class="fa-solid fa-pen"></i></a>
        <a href="index.php?page=supp&pg=salle&id=<?= $tblQuery[$i]['id_salle'] ?>"  onclick="return confirm('Etes vous certain de supprimer  cette salle ?')"><i class="fa-solid fa-trash"></i></a>
      </td>
      </tr>
    <?php } ?>

  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
        <div id="footTable">
          <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
          <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouterSalle'"> Ajouter une salle </button>
        </div>
      </td>
    </tr>
  </tfoot>
</table>

<?php
        // require "listeSalle.inc.php";
    }

} 


//   displayMessage("!");
?>