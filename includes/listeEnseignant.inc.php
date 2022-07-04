<?php
require './includes/header.php';
$sqlQuery = new Sql();
$requete = "SELECT DISTINCT en.id_enseignant, en.prenom, en.nom  FROM enseignants en ";

if(!empty($_SESSION['etablissement']))
{
  $requete .= "JOIN ETABLISSEMENTS_has_UTILISATEUR ehu ON en.id_enseignant = ehu.id_enseignant 
              where ehu.id_etablissement = ".$_SESSION['etablissement'];
}

$tblQuery = $sqlQuery->lister($requete);
//$tblQuery = $sqlQuery->lister("select * from enseignants");


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
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                      </div>
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
