<?php
spl_autoload_register(function ($className) {

  require '../../classes/' . $className . '.php';
});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from salles");

?>

<?php require './includes/header.php'; ?>
<!--/Table Liste Salle-->
<table>
  <thead>
    <tr>
      <th id="nomTable" colspan="5">Liste des salles</th>
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
    <tr id="titreTable">
      <th>Salles</th>
      <th>Caracteristique</th>
      <th>Voir planning</th>
      <th>Ecoles</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($tblQuery); $i++) { ?>

      <td><?= $tblQuery[$i]['nom_salle'] ?></td>
      <td><?= $tblQuery[$i]['caracteristique'] ?></td>
      <td>
        <a href="index.php?page=planningesalle">
          <i class="fa-solid fa-calendar-days fa-2x"></i>
        </a>
      </td>
      <td>Ecole 1</td>
      <td>
        <a href="index.php?page=edit&id=<?= $tblQuery[$i]['id_salle'] ?>" class="btn btn-supp"><i class="fa-solid fa-pen"></i></a>
        <a href="index.php?page=supp&id=<?= $tblQuery[$i]['id_salle'] ?>" class="btn btn-supp" onclick="return confirm('Etes vous certain de supprimer  cette salle ?')"><i class="fa-solid fa-trash"></i></a>
      </td>
      </tr>
    <?php } ?>

  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
        <div id="footTable">
          <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
          <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button>
        </div>
      </td>
    </tr>
  </tfoot>
</table>