<?php 

require './includes/header.php'; 

$sqlQuery = new Sql();

$requete = "select nom, prenom, id_promotion from eleves where id_eleve = ".$_GET['idEleve'];
$tblQuery = $sqlQuery->lister($requete);
$id_promotion = $tblQuery[0]['id_promotion'];
$nom = $tblQuery[0]['nom'];
$prenom = $tblQuery[0]['prenom'];

$requete = "select DATE_FORMAT(c.date, '%d/%m/%Y'), m.nom_matiere, c.heure_debut,c.heure_fin,s.nom_salle,en.nom,s.nom_salle 
            from cours c join salles s on c.id_salle = s.id_salle
            join matieres m on c.id_matiere = m.id_matiere
            join enseignants en on c.id_enseignant = en.id_enseignant
            where c.id_promotion = $id_promotion or c.id_eleve = ".$_GET['idEleve'];

$tblQuery = $sqlQuery->lister($requete);
dump($tblQuery);

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
                <th>Professeurs</th>
                <th>Salles</th>
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
                <td><?= $tblQuery[$i]['nom'] ?></td>
                <td><?= $tblQuery[$i]['nom_salle'] ?></td>
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
                  <button class="buttonTable" type="button" onclick="location.href='/*index.php?page=ajouterCoursEleve&idEleve=<//?=//$_GET['idEleve'] ?>*/'" > Ajouter un cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

