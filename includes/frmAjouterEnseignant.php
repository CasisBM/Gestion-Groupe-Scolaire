
<?php 

require './includes/header.php'; 
?>
<!--/Table Eleves-->
<form action="index.php?page=ajouterEnseignant" method="post">
    <table>
        <thead>
            <tr>
                <th class="nomTable" colspan="6">Ajouter Enseignant</th>
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
                <th>Mot de passe</th>
                <th>Prenom</th>
                <th>NOM</th>
                <th>Email</th>
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
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <div class="footTable">
                        <div data-pagination="" data-num-pages="numPages()" data-current-page="currentPage" data-max-size="maxSize" data-boundary-links="true"> </div>
                            <input type="reset" value="Effacer" />
                            <input type="submit" value="Ajouter un enseignant" />
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="frmAjouterEnseignant" />
</form>


