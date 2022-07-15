 <?php
    $sqlQuery = new Sql();
    $requete = "select id_etablissement from promotions where id_promotion = " . $_GET['idPromotion'];
    $tblQuery = $sqlQuery->lister($requete);
    $id_etablissement = $tblQuery[0]['id_etablissement'];

    $requete = "select nom_salle, id_salle
            from salles where id_etablissement = " . $id_etablissement;

    $tblQuery = $sqlQuery->lister($requete);

    ?>
 <form action="index.php?page=ajouterCoursPromotion&idPromotion=<?= $_GET['idPromotion'] ?>" method="post">
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
                 <th>Enseignant</th>
                 <th>Date</th>
                 <th>Horaires</th>
                 <th>Matieres</th>
                 <th>Salles</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>
                     <div>
                         <select class="select1" name="id_enseignant" id="id_enseignant" onchange="giveSelection(this.value)">
                             <option label="" value=""></option>
                             <?php
                                $requete = "SELECT en.id_enseignant, en.nom from enseignants en
                              join ETABLISSEMENTS_has_UTILISATEUR ehu on en.id_enseignant = ehu.id_enseignant 
                              where ehu.id_etablissement = $id_etablissement";
                                $tblEnseignant = $sqlQuery->lister($requete);

                                for ($i = 0; $i < count($tblEnseignant); $i++) {
                                ?>
                                 <option value="<?= $tblEnseignant[$i]['id_enseignant'] ?>"><?= $tblEnseignant[$i]['nom'] ?></option>
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
                         <select class="select2" name="id_matiere" id="id_matiere">
                             <?php
                                $requete = "SELECT ehm.id_enseignant,m.id_matiere,m.nom_matiere from ENSEIGNANTS_has_MATIERES ehm
                                 join ETABLISSEMENTS_has_UTILISATEUR ehu on ehm.id_enseignant = ehu.id_enseignant
                                 join matieres m on m.id_matiere = ehm.id_matiere
                                 where ehu.id_etablissement = $id_etablissement";
                                $tblMatiere = $sqlQuery->lister($requete);

                                for ($i = 0; $i < count($tblMatiere); $i++) {
                                ?>
                                 <option value="<?= $tblMatiere[$i]['id_matiere'] ?>" data-option="<?= $tblMatiere[$i]['id_enseignant'] ?>"><?= $tblMatiere[$i]['nom_matiere'] ?></option>
                             <?php  } ?>
                         </select>
                     </div>
                 </td>
                 <td>
                     <select name="id_salle" id="id_salle">
                         <?php for ($i = 0; $i < count($tblQuery); $i++) {
                            ?>
                             <option value="<?= $tblQuery[$i]['id_salle'] ?>"><?= $tblQuery[$i]['nom_salle'] ?></option>
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
                         <input type="hidden" name="frmAjouterCoursPromotion" />
                     </div>
                 </td>
             </tr>
         </tfoot>
     </table>
 </form>