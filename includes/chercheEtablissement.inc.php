<?php

//var_dump(isset($_POST['frmcheche']));

if (!isset($_POST['frmcheche'])) {
    include './includes/tbChoixEtablissement.php';
    //echo $message;
} else {


    $nom = htmlentities(trim($_POST['nom']));
    $keyword = '%' . $nom . '%';

    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de le établissement");
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
        include './includes/tbChoixEtablissement.php';
    } else {

        require './includes/header.php'; 
        $sqlQuery = new Sql();
        $tblQuery = $sqlQuery->lister("select * from etablissements where nom_etablissement like '$keyword';");
        ?>
        <!--/Table Liste établissements-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="4">Liste des établissements</th>
                </tr>
                <tr>
                  <th colspan="4">
                    <div class="search">
                    <form action="index.php?page=chercheEtablissement" method="POST">
                      <div class="search-box">
                      <?php  if (count($tblQuery)) { ?> 
                         <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                         <?php   } else { ?>
                            <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>                      
                      </div><i>il n'y pas de établissement <?=$nom ?></i>
                <?php   }     ?>
                      <input type="hidden" name="frmcheche" />
          </form>
                  </th>
                </tr>

                </div>
                <tr class="titreTable">
                  <th>Etablissements</th>
                  <th>Villes</th>
                  <th>Accès</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php   for ($i = 0; $i < count($tblQuery); $i++) { ?>
                  
                    <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
                    <td><?= $tblQuery[$i]['ville'] ?></td>
                    <td>
                      <a href="index.php?page=choixEtablissement&etablissement=<?= $tblQuery[$i]['id_etablissement'] ?>">
                        <i class="fa-solid fa-square-plus fa-2x">
                        </i>
                      </a>
                    </td>
                    <td>
                      <i class="fa-solid fa-pen"></i>
                      <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
              <?php } ?>
              
              </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4">
                    <div class="footTable">
                      <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                      <button class="buttonTable" type="button" onclick="location.href='index.php?page=choixEtablissement&etablissement'"> Gérer tous les établissements</button>
                      <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterEtablissement'"> Ajouter un établissements</button>
                    </div>
                  </td>
                </tr>
              </tfoot>
            </table>
            <?php
        // require "tbChoixEtablissement.php";
    }

} 

?>