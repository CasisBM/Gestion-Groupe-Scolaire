
<?php 
require './includes/header.php'; 

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("select * from promotions");
?>
<!--/Table Eleves-->
<form action="index.php?page=ajouterEleve" method="post">
    <table>
        <thead>
            <tr>
                <th class="nomTable" colspan="6">Liste des eleves</th>
            </tr>
            <tr>
                <th colspan="6">
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
                <th>Mot de passe</th>
                <th>Prenom</th>
                <th>NOM</th>
                <th>Email</th>
                <th>Promotion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div>
                        <input type="text" name="identifiant" id="identifiant" value="<?= $identifiant; ?>" />
                    </div>
                </td>
                <td>
                    <div>
                        <input type="password" name="password" id="password" />
                    </div>
                </td>
                <td>
                    <div>
                        <input type="text" name="prenom" id="prenom" value="<?= $prenom; ?>" />
                    </div>
                </td>
                <td>
                    <div>
                        <input type="text" name="nom" id="nom" value="<?= $nom; ?>" />
                    </div>
                </td>
                <td>
                    <div>
                        <input type="text" name="mail" id="mail" value="<?= $mail; ?>" />
                    </div>
                </td>

                <td>
                    <div>
                        <select name="id_promotion" id="id_promotion">
                            <?php for ($i = 0; $i < count($tblQuery); $i++) {
                            ?>
                                <option value="<?= $tblQuery[$i]['id_promotion'] ?>"><?= $tblQuery[$i]['nom_promotion'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </td>

            </tr>

        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <div class="footTable">
                        <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                        <button class="buttonTable" onclick="location.href='index.php?page=ajouterEleve'" type="button"> Ajouter un eleve </button>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</form>