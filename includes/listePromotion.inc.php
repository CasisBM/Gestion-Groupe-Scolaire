<?php

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("select * from promotions");

?>

<?php require './includes/admin/header.php'; ?>
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="5">Liste des promotions</th>
                </tr>
                <tr>
                  <th colspan="5">
                    <div class="container">
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                      </div>
                  </th>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Promotion</th>
                <th>Programmes d'enseignemants</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i <count($tblQuery) ; $i++) { ?>
              <tr>
                <td><?=$tblQuery[$i]['nom_promotion'] ?></td>
                <td>Second general</td>
                <td>
                  <a href="planningpromotion.php">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 1</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
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
                  <button class="buttonTable" type="button"> Ajouter une promotion </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
