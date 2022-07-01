<?php
if (!isset($_GET['id'])) {
    include 'listeSalle.inc.php';
    // header('Location:./index.php');
}

$requete = 'SELECT * FROM enseignants where id_enseignant = ' . $_GET['id'];

$querySelect = new Sql();
$prof = $querySelect->lister($requete);

$tblQuery = array();
$tblQuery = $querySelect->lister("select * from comptes");

?>
<?php require './includes/header.php'; ?>

<table>
    <thead>
        <tr>
            <th id="nomTable" colspan="5">Edit salle</th>
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

            <th>professeur</th>
            <th>nom</th>
            <th>prénom</th>
            <th>email</th>
            <th>telephone</th>
        </tr>
    </thead>
    <tbody>

        <form action="index.php?page=updateProf" method="post"">
        <td><input type=" text" id="identifiant" name="identifiant" value="<?= $prof[0]['identifiant'] ?>" />
        </td>
        <td><input type="text" id="nom" name="nom" value="<?= $prof[0]['nom'] ?>" /></td>
        <td><input type="text" id="prenom" name="prenom" value="<?= $prof[0]['prenom'] ?>" /></td>
        <td><input type="text" id="email" name="email" value="<?= $prof[0]['email'] ?>" /></td>
        <td><input type="text" id="telephone" name="telephone" value="<?= $prof[0]['telephone'] ?>" /></td>
        <td>
            <a href="index.php?page=planningesalle">
                <i class="fa-solid fa-calendar-days fa-2x"></i>
            </a>
        </td>
        <td>
            <div>
                <label for="id_compte">id_comptes :</label>
                <select name="id_compte" id="id_compte">
                    <?php for ($i = 0; $i < count($tblQuery); $i++) {
                    ?>
                        <option><?= $tblQuery[$i]['id_compte'] ?>-<?= $tblQuery[$i]['email'] ?></option>
                    <?php  } ?>
                </select>
            </div>
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
        <input type="hidden" name="id" id="id" value=<?= $prof[0]['id_enseignant'] ?>>
        <input type="hidden" name="frmUpdate" />
        </form>
        <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
        </div>
        </td>
        </tr>
    </tfoot>
</table>