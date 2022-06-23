<?php
spl_autoload_register(function($className){
  
   require '../../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->getSelect("select * from salles");

?>
<?php require './includes/admin/header.php'; ?>
       <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th id="nomTable" colspan="5">Liste des salles</th>
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
              <tr id="titreTable">
                <th>Salles</th>
                <th>Caracteristique</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i <count($tblQuery) ; $i++) { ?>
                
                <td><?=$tblQuery[$i]['nom_salle'] ?></td>
                <td><?=$tblQuery[$i]['caracteristique'] ?></td>
                <td>
                <a href="planningesalle.html">
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
                  <div id="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button id="buttonTable" type="button"> Ajouter une salle </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
