<!--/Table Liste Etablissements Prof-->
<?php require './includes/header.php';

if (isset($_GET['idProf']) && !empty($_GET['idProf'])) {

    $sqlQuery = new Sql();
    $requete = "select et.nom_etablissement, et.ville from ETABLISSEMENTS_has_UTILISATEUR ehu 
            join etablissements et on ehu.id_etablissement = et.id_etablissement 
            where  ehu.id_enseignant = '" . $_GET['idProf'] . "'";

    if (!empty($_SESSION['etablissement'])) {
        $requete .= " and en.id_etablissement = " . $_SESSION['etablissement'];
    }

    $tblQuery = $sqlQuery->lister($requete);
    $requete = "select prenom,nom from enseignants where id_enseignant = '" . $_GET['idProf'] . "'";
    $tblQueryPrenomNom = $sqlQuery->lister($requete);
} else {
    redirection("index.php?listeProfesseur");
}
?>

<table>
    <thead>
        <tr>
            <th class="nomTable" colspan="3">Liste des établissements de <?= $tblQueryPrenomNom[0]['prenom'] . ' ' . $tblQueryPrenomNom[0]['nom'] ?></th>
        </tr>
        <tr>
            <th colspan="3">
                <div class="search">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Recherche..">
                        <i class="fas fa-search search-button"></i>
                    </div>
            </th>
        </tr>

        </div>
        <tr class="titreTable">
            <th>Etablissements</th>
            <th>Villes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php

            for ($i = 0; $i < count($tblQuery); $i++) { ?>

                <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
                <td><?= $tblQuery[$i]['ville'] ?></td>
                <td>
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-trash"></i>
                </td>
        </tr>
    <?php } ?>

    </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <div class="footTable">
                    <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true">
                    </div>
                    <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterEtablissementProf&idProf=<?= $_GET['idProf'] ?>'">
                        Ajouter un établissement
                    </button>
                </div>
            </td>
        </tr>
    </tfoot>
</table>