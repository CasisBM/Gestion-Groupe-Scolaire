

<?php require './includes/header.php'; ?>
<!--/Table Liste Professeur-->
<table>
  <thead>
    <tr>
      <th class="nomTable" colspan="5">Liste des promotions</th>
    </tr>
    <tr>
      <th colspan="4">
        <div class="container">
          <div class="search-box">
            <input type="text" class="search-input" placeholder="Recherche..">
            <i class="fas fa-search search-button"></i>
          </div>
      </th>
    </tr>

    </div>
    <tr class="titreTable">
      <th>Promotion</th>
      <th>Voir planning</th>
      <th>Ecoles</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sqlQuery = new Sql();
    $tblQuery = $sqlQuery->lister("select p.id_promotion, p.nom_promotion,et.nom_etablissement  from promotions p 
                                  join etablissements et on p.id_etablissement = et.id_etablissement");
    for ($i = 0; $i < count($tblQuery); $i++) { ?>
      <tr>
        <td><?= $tblQuery[$i]['nom_promotion'] ?></td>
        <td>
          <a href="planningpromotion.php">
            <i class="fa-solid fa-calendar-days fa-2x"></i>
          </a>
        </td>
        <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
        <td>
          <a href="index.php?page=updatePromotion&idPromotion=<?= $tblQuery[$i]['id_promotion'] ?>"><i class="fa-solid fa-pen"></i></a>
          <a href="index.php?page=supprimer&table=promotions&id=<?= $tblQuery[$i]['id_promotion'] ?>" onclick="return confirm('Voulez vous vraiment supprimer cette promotion ?')"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">
        <div class="footTable">
          <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
          <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterPromotion'"> Ajouter une promotion </button>
        </div>
      </td>
    </tr>
  </tfoot>
</table>