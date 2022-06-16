
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th id="nomTable" colspan="6">Liste des eleves</th>
                </tr>
                <tr>
                  <th colspan="6">
                    <div class="container">
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                           <i class="fas fa-search search-button"></i>
                      </div>
                  </th>
                </tr>
                
               </div>
              <tr id="titreTable">
                <th>Eleves</th>
                <th>Promotions</th>
                <th>Voir profil</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nicolas LAMIE</td>
                <td>Second</td>
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="planningeleve.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 1</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Louis CAILLOUX</td>
                <td>Premiere</td>
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="planningeleve.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                   </a>
                   
                </td>
                <td>Ecole 2</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Marie BOGOSS</td>
                <td>Terminal</td>
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="planningeleve.html">
                  <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 3</td>
                <td>
                    <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="6">
                  <div id="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button id="buttonTable" type="button"> Ajouter un eleve </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
