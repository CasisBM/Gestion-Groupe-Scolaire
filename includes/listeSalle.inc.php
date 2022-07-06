
<?php

require './includes/header.php';
$sqlQuery = new Sql();
$tblQuery = array();
$requete = "select s.id_salle,s.nom_salle,s.caracteristique,e.nom_etablissement from salles s join etablissements e on s.id_etablissement = e.id_etablissement;";




<!--/Table Liste Salle-->
<table>
  <thead>
    <tr>
      <th class="nomTable" colspan="5">Liste des salles</th>
    </tr>
    <tr>
      <th colspan="5">
        <div class="search">
          <form action="index.php?page=chercheSalle" method="POST">
            <div class="search-box">
              <input type="text" name="sallename" id="sallename" class="search-input" placeholder="Recherche..">
              <i class="fas fa-search search-button"></i>
            </div>
            <input type="hidden" name="frmcheche" />
          </form>
      </th>
    </tr>

    </div>
    <tr class="titreTable">
      <th>Salles</th>
      <th>Caracteristique</th>
      <th>Voir planning</th>
      <th>Ecoles</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sqlQuery = new Sql();
    $tblQuery = array();
    $requete = "select s.id_salle,s.nom_salle,s.caracteristique,e.nom_etablissement from salles s join etablissements e on s.id_etablissement = e.id_etablissement";
    
    if (!empty($_SESSION['etablissement'])) {
      $requete .= " where s.id_etablissement = " . $_SESSION['etablissement'];
    }
    
    $tblQuery = $sqlQuery->lister($requete.";");
    for ($i = 0; $i < count($tblQuery); $i++) { ?>

      <td><?= $tblQuery[$i][1] ?></td>
      <td><?= $tblQuery[$i]['caracteristique'] ?></td>
      <td>
        <form action="" method="$_POST">
          <a href="index.php?page=planningSalle&idSalle=<?= $tblQuery[$i]['id_salle'] ?>">
            <i name="submit" id="submit" class="fa-solid fa-calendar-days fa-2x"></i>
        </form>
        </a>
      </td>
      <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
      <td>
        <a href="index.php?page=updateSalle&idSalle=<?= $tblQuery[$i]['id_salle'] ?>">
          <i class="fa-solid fa-pen"></i>
        </a>
        <a href="index.php?page=supprimer&table=salles&id=<?= $tblQuery[$i]['id_salle'] ?>" onclick="return confirm('Etes vous certain de supprimer  cette salle ?')">
          <i class="fa-solid fa-trash"></i>
        </a>
      </td>
      </tr>
    <?php } ?>

  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
        <div class="footTable">
          <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
          <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterSalle'"> Ajouter une salle </button>
        </div>
      </td>
    </tr>
  </tfoot>
</table>