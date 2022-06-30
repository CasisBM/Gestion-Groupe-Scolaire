<?php
spl_autoload_register(function ($class) {
    require '../classes/' . $class . '.php';
});

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("select * from planning eleve");


?>
<?php require 'header.php'; ?>
            <!--/Table plannig eleve-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="5">planning eleve</th>
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
                <th>Matiere</th>
                <th>Date</th>                
                <th>Heure</th>
                <th>Salle</th>
                <th>Professeur</th>
                <th>Ecole</th>
                <th>Actions</th>
              </tr>
              </thead>
            <tbody>
              <tr>
                <td>Maths</td>
                <td>11/05/2022</td>
                <td>17:30 - 19:00</td>
                <td>306</td>
                <td>Cedric DURON</td>
                <td>Ecole 00</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Anglais</td>
                <td>12/05/2022</td>
                <td>16:30 - 17:30</td>
                <td>PEUPLIER</td>
                <td>Jean-louis DE LA ROCHE</td>
                <td>Ecole 2</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Histoire</td>
                <td>13/05/2022</td>
                <td>13:00 - 14:00</td>
                <td>ERABLE</td>
                <td>Emilie Bocase</td>
                <td>Ecole 3</td>
                <td>
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
                  <button class="buttonTable"type="button"> Ajouter cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
