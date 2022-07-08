<?php
if (!isset($_GET['idEtablissement'])) {
    include 'choixEtablissement.inc.php';
}

$requete = "SELECT nom_etablissement,ville FROM etablissements where id_etablissement = '" . $_GET['idEtablissement'] . "'";

$querySelect = new Sql();
$tblQuery = $querySelect->lister($requete);


?>
<?php require './includes/header.php'; ?>

<table>
    <thead>
        <tr>
            <th id="nomTable" colspan="2">Edit etablissement</th>
        </tr>
        <tr>
            <th colspan="2">
                <div class="search">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Recherche..">
                        <i class="fas fa-search search-button"></i>
                    </div>
            </th>
        </tr>

        </div>
        <tr id="titreTable">
            <th>Nom de l'etablissement</th>
            <th>Ville</th>
        </tr>
    </thead>
    <tbody>

        <form action="index.php?page=updateEtablissement" method="post">
            <td>
                <input type=" text" id="nom_etablissement" name="nom_etablissement" value="<?= $tblQuery[0]['nom_etablissement'] ?>" />
            </td>
            <td><input type="text" id="ville" name="ville" value="<?= $tblQuery[0]['ville'] ?>" /></td>
            <td>
                <a href="index.php?page=planningesalle">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                </a>
            </td>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <div id="footTable">
                    <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                    <div>
                        <input type="reset" value="Effacer" />
                        <input type="submit" value="Update" />
                    </div>
        </tr>
        <input type="hidden" name="id" id="id" value=<?= $_GET['idEtablissement'] ?>>
        <input type="hidden" name="frmUpdateEtablissement" />
        </form>
        <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
        </div>
        </td>
        </tr>
    </tfoot>
</table>