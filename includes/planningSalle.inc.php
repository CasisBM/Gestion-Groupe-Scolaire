<?php 

require './includes/header.php'; 

$sqlQuery = new Sql();
$requete = "select DATE_FORMAT(c.date, '%d/%m/%Y'), m.nom_matiere, c.heure_debut,c.heure_fin,s.nom_salle,en.nom,p.nom_promotion 
            from cours c join salles s on c.id_salle = s.id_salle
            join matieres m on c.id_matiere = m.id_matiere
            join enseignants en on c.id_enseignant = en.id_enseignant
            join promotions p on c.id_promotion = p.id_promotion
            where c.id_salle = ".$_GET['idSalle'];

$tblQuery = $sqlQuery->lister($requete);
?>
    <input type="date" min="2022-01-01" max="2025-01-01"/>

            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="6">Planning (Nom Salles)</th>
                </tr>
                <tr>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Matiere</th>
                <th>Date</th>
                <th>Horaires</th>
                <th>Professeurs</th>
                <th>Promotions</th>
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
                <td><?= $tblQuery[$i]['nom_promotion'] ?></td>
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
                  <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterCours&idSalle=<?= $_GET['idSalle'] ?>'" > Ajouter un cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 

