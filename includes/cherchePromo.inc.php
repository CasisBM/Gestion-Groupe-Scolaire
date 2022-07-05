<?php

//var_dump(isset($_POST['frmcheche']));

if (!isset($_POST['frmcheche'])) {
    include './includes/listePromotion.inc.php';
    //echo $message;
} else {


    $nom = htmlentities(trim($_POST['nom_promotion']));
    $keyword = '%' . $nom . '%';

    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de la promotion");
    };


    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/listePromotion.inc.php';
    } else {
        require './includes/header.php';
        $sqlQuery = new Sql();
                $tblQuery = $sqlQuery->lister("select p.id_promotion, p.nom_promotion,et.nom_etablissement  from promotions p 
                                  join etablissements et on p.id_etablissement = et.id_etablissement where p.nom_promotion like '$keyword';");
?>

        <!--/Table Liste Promotion-->
        <table>
            <thead>
                <tr>
                    <th class="nomTable" colspan="5">Liste des promotions</th>
                </tr>
                <tr>
                    <th colspan="4">
                        <div class="container">
                            <form action="index.php?page=cherchePromo" method="POST">
                                <div class="search-box">
                                <?php  if (count($tblQuery)) { ?> 
                                    <input type="text" id="nom_promotion" name="nom_promotion" class="search-input" placeholder="Recherche..">
                                    <i class="fas fa-search search-button"></i>
                                    <?php   } else { ?>
                                        <input type="text" id="nom_promotion" name="nom_promotion" class="search-input" placeholder="Recherche..">
                                    <i class="fas fa-search search-button"></i>
                                        </div><i>il n'y pas de salle <?=$nom ?></i>
                <?php   }     ?>
                                <input type="hidden" name="frmcheche" />
                            </form>
                    </th>
                </tr>

                </div>
                <tr class="titreTable">
                    <th>Promotion</th>
                    <th>Voir planning</th>
                    <th>Ecoles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php    for ($i = 0; $i < count($tblQuery); $i++) { ?>
                    <tr>
                        <td><?= $tblQuery[$i]['nom_promotion'] ?></td>
                        <td>
                            <a href="planningpromotion.php">
                                <i class="fa-solid fa-calendar-days fa-2x"></i>
                            </a>
                        </td>
                        <td><?= $tblQuery[$i]['nom_etablissement'] ?></td>
                        <td>
                            <a href="index.php?page=updatePromotion&idPromotion=<?= $tblQuery[$i]['id_promotion'] ?>"><i class="fa-solid fa-pen"></i></a>
                            <a href="index.php?page=supprimer&table=promotions&id=<?= $tblQuery[$i]['id_promotion'] ?>" onclick="return confirm('Voulez vous vraiment supprimer cette promotion ?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <div class="footTable">
                            <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                            <button class="buttonTable" type="button" onclick="location.href='index.php?page=ajouterPromotion'"> Ajouter une promotion </button>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

<?php
        // require "listeSalle.inc.php";
    }
}


//   displayMessage("!");
?>