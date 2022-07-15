
<?php
require './includes/header.php';

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("SELECT m.nom_matiere,m.id_matiere FROM matieres m JOIN enseignants_has_matieres ehm
                                ON m.id_matiere = ehm.id_matiere WHERE ehm.id_enseignant = ".$_GET['idEnseignant'])

?>

<!--/Table Liste Professeur-->
<table>
  <thead>
    <tr>
      <th class="nomTable" colspan="5">Liste des matieres de (Prenom NOM)</th>
    </tr>
    <tr>
      <th colspan="2">
        <div class="container">
          <div class="search-box">
            <input type="text" class="search-input" placeholder="Recherche..">
            <i class="fas fa-search search-button"></i>
          </div>
      </th>
    </tr>

    </div>
    <tr class="titreTable">
      <th>Nom de la matiere</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($tblQuery); $i++) { ?>
      <tr>
        <td><?= $tblQuery[$i]['nom_matiere'] ?></td>
        <td>
          <a href=""><i class="fa-solid fa-pen"></i></a>
          <a href="index.php?page=supprimer&table=matiere&id=<?=$_GET['idEnseignant'] ?>&idMatiere=<?=$tblQuery[$i]['id_matiere'] ?>" onclick="return confirm('Voulez vous vraiment supprimer cette matiere ?')">
          <i class="fa-solid fa-trash"></i>
        </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">
        <div class="footTable">
          <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
          <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterMatiere&idEnseignant=<?= $_GET['idEnseignant'] ?>'"> Ajouter une matiere </button>
        </div>
      </td>
    </tr>
  </tfoot>
</table>