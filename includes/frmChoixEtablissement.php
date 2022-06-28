            <!--/Table Liste Cours-->
            <?php require '../header.php'; ?>
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="4">Liste des établissements</th>
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
              <tr class="titreTable">
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
                  <div class="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button class="buttonTable" type="button"> Gérer tous les établissements</button></div>
                <button class="buttonTable" type="button"> Ajouter un établissements</button></div>
            </td>
              </tr>
            </tfoot>
            </table> 