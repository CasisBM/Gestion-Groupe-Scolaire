            <!--/Table Liste Cours-->
            <?php require './includes/header.php'; ?>
            <table>
              <thead>
                <tr>
                  <th id="nomTable" colspan="4">Liste des établissements</th>
                </tr>
                <tr>
                  <th colspan="4">
                    <div class="search">
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                           <i class="fas fa-search search-button"></i>
                      </div>
                  </th>
                </tr>
                
               </div>
              <tr id="titreTable">
                <th>Etablissements</th>
                <th>Villes</th>
                <th>Accès</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ecole 1</td>
                <td>ROUEN</td>
                <td>
                  <i class="fa-solid fa-square-plus fa-2x" ></i>
                </td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Ecole 2</td>
                <td>ISNEAUVILLE</td>
                <td>
                  <i class="fa-solid fa-square-plus fa-2x" ></i>
                </td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Ecole 3</td>
                <td>BOIS-GUILLAUME</td>
                <td>
                  <i class="fa-solid fa-square-plus fa-2x" ></i>
                </td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="4">
                  <div id="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button id="buttonTable" type="button"> Gérer tous les établissements</button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

            <!--/Table Derniers Cours Ajouté-->
      
      <table>
        <thead>
          <tr>
            <th id="nomTable" colspan="6"> Derniers ajout de cours</th>
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
          <th>Matiere</th>
          <th>Promotions</th>
          <th>Professeur</th>
          <th>Salles</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Anglais</td>
          <td>Second1</td>
          <td>Cedric DURON</td>
          <td>306</td>
          <td class="sta">A venir</td>
          <td>
            <i class="fa-solid fa-pen"></i>
            <i class="fa-solid fa-trash"></i>
          </td>
        </tr>

        <tr>
          <td>Français</td>
          <td>Premiere2</td>
          <td>Jean-louis DE LA ROCHE</td>
          <td>ERABLE</td>
          <td>En cours</td>
          <td>
            <i class="fa-solid fa-pen"></i>
            <i class="fa-solid fa-trash"></i>
          </td>
        </tr>

        <tr>
          <td>Maths</td>
          <td>Terminal3</td>
          <td>Emilie BOCASE</td>
          <td>ACCUEIL</td>
          <td>Terminé</td>
          <td>
            <i class="fa-solid fa-pen"></i>
            <i class="fa-solid fa-trash"></i>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr >
          <td  colspan="4">
            <div id="footTable">
              <div
              data-pagination=""
              data-num-pages="numPages()"
              data-current-page="currentPage"
              data-max-size="maxSize"
              data-boundary-links="true"
            > </div>
            </td>
        </tr>
      </tfoot>
      </table> 