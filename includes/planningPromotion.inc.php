<?php require './includes/admin/header.php'; ?>
    <input type="date" min="2022-01-01" max="2025-01-01">
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="6">Planning (Nom Promotion)</th>
                </tr>          
               </div>
              <tr class="titreTable">
                <th>Matiere</th>
                <th>Date</th>
                <th>Horaires</th>
                <th>Salles</th>
                <th>Professeur</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Maths</td>
                <td>11/05/2022</td>
                <td>17:30 - 19:00</td>
                <td>306</td>
                <td>Cedric DURON </td>
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
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
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
                  <button class="buttonTable" type="button"> Ajouter un cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

