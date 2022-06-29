<?php

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("select * from enseignants");

?>
<?php require './includes/header.php'; ?>
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="5">Liste des professeurs</th>
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
                <th>Professeurs</th>
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
                  <a href="planningprof.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 1</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash" href="index.php?page=supp&class="></i>
                </td>
              </tr>
              <?php } ?>
             
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="5">
                  <div class="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button class="buttonTable" onclick="location.href='index.php?page=ajouterProf'" type="button"> Ajouter un professeur </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
