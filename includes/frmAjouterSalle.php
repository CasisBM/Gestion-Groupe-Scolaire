<?php
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from etablissements");

?>

<?php require './includes/header.php'; ?>

<table>
    <thead>
        <tr>
            <th id="nomTable" colspan="5">Ajouter salle</th>
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
            <th>Nom de l'etablissement</th>
        </tr>
    </thead>
    <tbody>

        <form action="index.php?page=ajouterSalle" method="post">
            <td><input type=" text" id="nom" name="nom" />
        </td>
        <td><input type="text" id="caracteristique" name="caracteristique" /></td>
        <td>
            <div>
                <select name="id_etablissement" id="id_etablissement">
                    <?php for ($i = 0; $i < count($tblQuery); $i++) {
                    ?>
                        <option value="<?= $tblQuery[$i]['id_etablissement'] ?>"><?= $tblQuery[$i]['nom_etablissement'] ?></option>
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

        <input type="hidden" name="frmAjouterSalle" />
        </form>
        <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
        </div>
        </td>
        </tr>
    </tfoot>
</table>