<?php 

require './includes/header.php'; 

$sqlQuery = new Sql();

$requete = "select nom, prenom from enseignants where id_enseignant = ".$_GET['idEnseignant'];
$tblQuery = $sqlQuery->lister($requete);

$nom = $tblQuery[0]['nom'];
$prenom = $tblQuery[0]['prenom'];
$id_enseignant = $_GET['idEnseignant'];

$requete = "select DATE_FORMAT(c.date, '%d/%m/%Y'), m.nom_matiere, c.heure_debut,c.heure_fin, 
            s.nom_salle, s.nom_salle, p.nom_promotion, et.nom_etablissement
            from cours c join salles s on c.id_salle = s.id_salle
            join matieres m on c.id_matiere = m.id_matiere
            join promotions p on c.id_promotion = p.id_promotion
            join etablissements et on et.id_etablissement = p.id_etablissement
            where c.id_enseignant = $id_enseignant;";

$tblQuery = $sqlQuery->lister($requete);

?>
    <input type="date" min="2022-01-01" max="2025-01-01"/>

            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="6">Planning <?=$prenom." ".$nom?></th>
                </tr>
                <tr>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Matieres</th>
                <th>Dates</th>
                <th>Horaires</th>
                <th>Promotion</th>
                <th>Salles</th>
                <th>Etablissement</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              for ($i=0; $i <count($tblQuery) ; $i++) { ?>
              <tr>
                <td><?= $tblQuery[$i]['nom_matiere'] ?></td>
                <td><?= $tblQuery[$i][0] ?></td>
                <td><?= $tblQuery[$i]['heure_debut'] ?> ~ <?= $tblQuery[$i]['heure_fin'] ?></td>
                <td><?= $tblQuery[$i]['nom_promotion'] ?></td>
                <td><?= $tblQuery[$i]['nom_salle'] ?></td>
                <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            <?php } ?>
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
                  <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterCoursEnseignant&idEnseignant=<?= $_GET['idEnseignant'] ?>'" > Ajouter un cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

