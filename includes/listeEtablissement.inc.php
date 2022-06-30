<!--/Table Liste Etablissements Prof-->
<?php require './includes/header.php'; 

if(isset($_GET['idProf']) && !empty($_GET['idProf']))
{

$sqlQuery = new Sql();
$requete = "select en.id_enseignant,en.prenom,en.nom,et.nom_etablissement from enseignants en join ETABLISSEMENTS_has_UTILISATEUR ehu on 
            ehu.id_enseignant = en.id_enseignant join etablissements et on ehu.id_etablissement = et.id_etablissement 
            where  en.id_enseignant = '".$_GET['idProf']."'";

if(!empty($_SESSION['etablissement']))
{
    $requete .= " and en.id_etablissement = ".$_SESSION['etablissement'];
}

$tblQuery = $sqlQuery->lister($requete);
dump($requete);
dump($tblQuery);
}
else
{
    redirection("index.php?listeProfesseur");
}
?>

<table>
    <thead>
    <tr>
        <th class="nomTable" colspan="4">Liste des établissements de <?=$tblQuery[0]['prenom'].' '.$tblQuery[0]['nom'] ?></th>
    </tr>
    <tr>
        <th colspan="4">
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
        <th>Accès</th>
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
            <a href="index.php?page=choixEtablissement&etablissement=<?= $tblQuery[$i]['id_etablissement'] ?>">
            <i class="fa-solid fa-square-plus fa-2x">
            </i>
            </a>
        </td>
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
        <td colspan="4">
        <div class="footTable">
            <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
            <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterEtablissementProf&idProf=<?=$_GET['idProf']?>'"> Ajouter un établissement </button>
        </div>
        </td>
    </tr>
    </tfoot>
</table>