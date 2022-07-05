 <?php
$sqlQuery = new Sql();
$requete = "select m.nom_matiere,m.id_matiere,en.nom,en.id_enseignant,p.nom_promotion 
            from cours c join salles s on c.id_salle = s.id_salle
            join matieres m on c.id_matiere = m.id_matiere
            join enseignants en on c.id_enseignant = en.id_enseignant
            join promotions p on c.id_promotion = p.id_promotion
            where c.id_salle = ".$_GET['idSalle'];

$tblQuery = $sqlQuery->lister($requete);

    ?>
 <table>
     <thead>
         <tr>
             <th class="nomTable" colspan="6">Ajouter une matiere</th>
         </tr>
         <tr>
             <th colspan="6">
                 <div class="search">
                     <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                     </div>
             </th>
         </tr>

         </div>
         <tr class="titreTable">
             <th>Liste des matieres disponibles</th>
             <th>Ajouter une nouvelle matiere</th>
         </tr>
     </thead>
     <tbody>
         <tr>
             <td>
                 <div>
                     <form action="index.php?page=ajouterMatiere&idEnseignant=<?=$_GET['idEnseignant']?>" method="post">
                         <select name="id_matiere" id="id_matiere">
                             <?php for ($i = 0; $i < count($tblQuery); $i++) {
                                ?>
                                 <option value="<?= $tblQuery[$i]['id_matiere'] ?>"><?= $tblQuery[$i]['nom_matiere'] ?></option>
                             <?php  } ?>
                         </select>
                         <input type="submit" value="valider" />
                         <input type="hidden" name="frmAjouterMatiereEnseignant" />
                     </form>
                 </div>
             </td>
             <td>
             <form action="index.php?page=ajouterMatiere&idEnseignant=<?= $_GET['idEnseignant'] ?>" method="post">
                 <input type="text" name="nom_matiere" id="nom_matiere">
                 <input type="submit" value="valider">
                 <input type="hidden" name="frmAjouterMatiere" />
            </form>
             </td>

         </tr>

     </tbody>
     <tfoot>
         <tr>
             <td colspan="6">
                 <div class="footTable">
                     <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>

                 </div>
             </td>
         </tr>
     </tfoot>
 </table>