 <?php
    $sqlQuery = new Sql();
    //$requete = ;
    //$tblQuery = $sqlQuery->lister($requete);
    //$id_etablissement = $tblQuery[0]['id_etablissement'];
    $requete = "select m.nom_matiere, m.id_matiere
            from ENSEIGNANTS_has_MATIERES ehm
            join matieres m on m.id_matiere = ehm.id_matiere
            where ehm.id_enseignant = " . $_GET['idEnseignant'];

    $tblQuery = $sqlQuery->lister($requete);

    ?>
 <form action="index.php?page=ajouterCoursEnseignant&idEnseignant=<?= $_GET['idEnseignant'] ?>" method="post">
     <table>
         <thead>
             <tr>
                 <th class="nomTable" colspan="5">Ajouter un cours</th>
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
                 <th>Salles</th>
                 <th>Date</th>
                 <th>Horaires</th>
                 <th>Promotion</th>
                 <th>Matiere</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>
                     <div>
                         <select class="select1" name="id_salle" id="id_salle" onchange="giveSelection(this.children[this.selectedIndex].innerText)">
                             <option label="" value=""></option>
                             <?php
                                $requete = "SELECT DISTINCT s.id_salle, s.nom_salle, s.id_etablissement from salles s
                              join ETABLISSEMENTS_has_UTILISATEUR ehu on s.id_etablissement = s.id_etablissement 
                              where ehu.id_enseignant = " . $_GET['idEnseignant'];
                                $tblSalle = $sqlQuery->lister($requete);

                                for ($i = 0; $i < count($tblSalle); $i++) {
                                ?>
                                 <option label="<?= $tblSalle[$i]['nom_salle'] ?>" value="<?= $tblSalle[$i]['id_salle'] ?>"><?= $tblSalle[$i]['id_etablissement'] ?></option>
                             <?php  } ?>
                         </select>
                     </div>
                 </td>
                 <td>
                     <input type="date" name="date" id="date" required>
                 </td>
                 <td>
                     <input type="time" id="heure_debut" name="heure_debut" required>
                     <input type="time" id="heure_fin" name="heure_fin" required>
                 </td>
                 <td>
                     <div>
                         <select class=select2 name="id_promotion" id="id_promotion">
                             <?php
                                $requete = "SELECT p.id_promotion,p.nom_promotion,p.id_etablissement from ETABLISSEMENTS_has_UTILISATEUR ehu 
                                 join promotions p on p.id_etablissement = ehu.id_etablissement
                                 where ehu.id_enseignant =" . $_GET['idEnseignant'];
                                $tblPromotion = $sqlQuery->lister($requete);

                                for ($i = 0; $i < count($tblPromotion); $i++) {
                                ?>
                                 <option value="<?= $tblPromotion[$i]['id_promotion'] ?>" data-option="<?= $tblPromotion[$i]['id_etablissement'] ?>"><?= $tblPromotion[$i]['nom_promotion'] ?></option>
                             <?php  } ?>
                         </select>
                     </div>
                 </td>
                 <td>
                     <select name="id_matiere" id="id_matiere">
                         <?php for ($i = 0; $i < count($tblQuery); $i++) {
                            ?>
                             <option value="<?= $tblQuery[$i]['id_matiere'] ?>"><?= $tblQuery[$i]['nom_matiere'] ?></option>
                         <?php  } ?>
                     </select>
                     </div>
                 </td>

             </tr>

         </tbody>
         <tfoot>
             <tr>
                 <td colspan="6">
                     <div class="footTable">
                         <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                         <input type="submit" value="valider" />
                         <input type="hidden" name="frmAjouterCoursEnseignant" />
                     </div>
                 </td>
             </tr>
         </tfoot>
     </table>
 </form>