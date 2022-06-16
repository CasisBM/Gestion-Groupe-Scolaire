<!DOCTYPE html>

            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th id="nomTable" colspan="5">Liste des promotions</th>
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
              <tr id="titreTable">
                <th>Promotion</th>
                <th>Programmes d'enseignemants</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Second1</td>
                <td>Second general</td>
                <td>
                  <a href="planningpromotion.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 1</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Premiere2</td>
                <td>Premiere BAC STI2D</i></td>
                <td>
                  <a href="planningpromotion.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 2</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Terminal3</td>
                <td>Terminal BAC PRO Agricole</i></td>
                <td>
                  <a href="planningpromotion.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 3</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
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
                  <button id="buttonTable" type="button"> Ajouter une promotion </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
