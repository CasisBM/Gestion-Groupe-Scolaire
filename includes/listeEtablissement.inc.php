<!--/Table Liste Etablissements Prof-->
<?php 

require './includes/header.php';

if (isset($_GET['idEnseignant']) && !empty($_GET['idEnseignant'])) {

    $sqlQuery = new Sql();
    $requete = "select et.nom_etablissement, et.ville from ETABLISSEMENTS_has_UTILISATEUR ehu 
            join etablissements et on ehu.id_etablissement = et.id_etablissement 
            where  ehu.id_enseignant = '" . $_GET['idEnseignant'] . "'";

    /* if (!empty($_SESSION['etablissement'])) {
        $requete .= " and ehu.id_etablissement = " . $_SESSION['etablissement'];
    } */

    $tblQuery = $sqlQuery->lister($requete);
    $requete = "select prenom,nom from enseignants where id_enseignant = '" . $_GET['idEnseignant'] . "'";
    $tblQueryPrenomNom = $sqlQuery->lister($requete);
} else {
    redirection("index.php?listeEnseignant");
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
                <form action="index.php?page=chercheEtablissement" method="POST">
                    <div class="search-box">
                        <input type="text" id="nom" name="nom" class="search-input" placeholder="Recherche..">
                        <i class="fas fa-search search-button"></i>
                    </div>
                    <input type="hidden" name="frmcheche" />
          </form>
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
                    <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterEtabEnseignant&idEnseignant=<?= $_GET['idEnseignant'] ?>'">
                        Ajouter un établissement
                    </button>
                </div>
            </td>
        </tr>
    </tfoot>
</table>