<?php

$sqlQuery = new Sql();
$requete = "select el.id_eleve, el.prenom, el.nom, et.nom_etablissement, p.nom_promotion from eleves el join promotions p on el.id_promotion = p.id_promotion
            join etablissements et on et.id_etablissement = p.id_etablissement";
$tblQuery = $sqlQuery->lister($requete);

if(!empty($_SESSION['etablissement']))
{
  $requete .= " where p.id_etablissement = ".$_SESSION['etablissement'];
}


?>
<?php require './includes/header.php'; ?>
            <!--/Table Liste Eleves-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="6">Liste des eleves</th>
                </tr>
                <tr>
                  <th colspan="6">
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
                  <a href="index.php?page=supprimer&table=eleves&id=<?= $tblQuery[$i]['id_eleve'] ?>" onclick="return confirm('Etes vous certain de supprimer cette salle ?')"><i class="fa-solid fa-trash"></i></a>
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
