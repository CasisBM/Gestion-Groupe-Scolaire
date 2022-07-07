<?php
require './includes/header.php';

if (!isset($_GET['idEleve'])) {
    include 'listeSalle.inc.php';
    // header('Location:./index.php');
}

$requete = 'SELECT * FROM eleves where id_eleve = ' . $_GET['idEleve'];

$querySelect = new Sql();
$tblQuery = $querySelect->lister($requete);
$tblQueryPromo = $querySelect->lister("select * from promotions");

?>

<table>
    <thead>
        <tr>
            <th class="nomTable" colspan="5">Edit Eleve</th>
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
        <tr class="titreTable">

            <th>Identifiant</th>
            <th>nom</th>
            <th>prénom</th>
            <th>email</th>
            <th>promotion</th>
        </tr>
    </thead>
    <tbody>

        <form action="index.php?page=updateEleve" method="post">
            <td><input type=" text" id="identifiant" name="identifiant" value="<?= $tblQuery[0]['identifiant'] ?>" />
            </td>
            <td><input type="text" id="nom" name="nom" value="<?= $tblQuery[0]['nom'] ?>" /></td>
            <td><input type="text" id="prenom" name="prenom" value="<?= $tblQuery[0]['prenom'] ?>" /></td>
            <td><input type="text" id="email" name="email" value="<?= $tblQuery[0]['email'] ?>" /></td>
            <td><div>
                        <select name="id_promotion" id="id_promotion">
                        <option value=null></option>
                            <?php 
                            
                            for ($i = 0; $i < count($tblQueryPromo); $i++) {
                            ?>
                                <option value="<?= $tblQueryPromo[$i]['id_promotion'] ?>"><?= $tblQueryPromo[$i]['nom_promotion'] ?></option>
                            <?php  } ?>
                        </select>
                    </div></td>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <div class="footTable">
                    <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                    <div>
                        <input class="buttonTable" type="reset" value="Effacer" />
                        <input class="buttonTable" type="submit" value="Changer l'eleve" />
                    </div>
        </tr>
        <input type="hidden" name="frmUpdateEleve" />
        </form>
        <!-- <button id="buttonTable" type="button" onclick="location.href='index.php?page=ajouteSalle'"> Ajouter une salle </button> -->
    </tfoot>
</table>