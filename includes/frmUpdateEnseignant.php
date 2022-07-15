<?php

require './includes/header.php';
if (!isset($_GET['idEnseignant'])) {
    $url = "index.php?page=listeEnseignant";
    echo redirection($url);
}

$requete = 'SELECT * FROM enseignants where id_enseignant = ' . $_GET['idEnseignant'];
$querySelect = new Sql();
$tblQuery = $querySelect->lister($requete);

?>

<table>
    <thead>
        <tr>
            <th id="nomTable" colspan="5">Edit Enseignant</th>
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

            <th>Identifiant</th>
            <th>nom</th>
            <th>prénom</th>
            <th>email</th>
            <th>telephone</th>
        </tr>
    </thead>
    <tbody>

        <form action="index.php?page=updateEnseignant" method="post">
        <td><input type=" text" id="identifiant" name="identifiant" value="<?= $tblQuery[0]['identifiant'] ?>" />
        </td>
        <td><input type="text" id="nom" name="nom" value="<?= $tblQuery[0]['nom'] ?>" /></td>
        <td><input type="text" id="prenom" name="prenom" value="<?= $tblQuery[0]['prenom'] ?>" /></td>
        <td><input type="text" id="email" name="email" value="<?= $tblQuery[0]['email'] ?>" /></td>
        <td><input type="text" id="telephone" name="telephone" value="<?= $tblQuery[0]['telephone'] ?>" /></td>

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
        <input type="hidden" name="id" id="id" value=<?= $tblQuery[0]['id_enseignant'] ?>>
        <input type="hidden" name="frmUpdateEnseignant" />
        </form>
        <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
        </div>
        </td>
        </tr>
    </tfoot>
</table>