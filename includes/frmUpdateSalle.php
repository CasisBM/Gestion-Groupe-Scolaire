<?php
if (!isset($_GET['idSalle'])) {
    include 'listeSalle.inc.php';
    // header('Location:./index.php');
}

$requete = 'SELECT * FROM salles where id_salle = ' . $_GET['idSalle'];

$querySelect = new Sql();
$salle = $querySelect->lister($requete);

$tblQuery = array();

$tblQuery = $querySelect->lister("select * from etablissements");


?>
<?php require './includes/header.php'; ?>

<table>
    <thead>
        <tr>
            <th id="nomTable" colspan="5">Edit salle</th>
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
            <th>Salles</th>
            <th>Caracteristique</th>
        </tr>
    </thead>
    <tbody>
       
<form action="index.php?page=updateSalle" method="post"">
            <td><input type="text" id="nom" name="nom" value="<?= $salle[0]['nom_salle'] ?>" /></td>
            <td><input type="text" id="caracteristique" name="caracteristique" value="<?= $salle[0]['caracteristique'] ?>" /></td>     
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <div id="footTable">
                        <div>
                            <input type="reset" value="Effacer" />
                            <input type="submit" value="Update" />
                        </div>
                    </tr>
                        <input type="hidden" name="id" id="id" value=<?=$salle[0]['id_salle']?>>
                <input type="hidden" name="frmUpdateSalle" />
                        </form>
                    <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
                </div>
            </td>
        </tr>
    </tfoot>
</table>