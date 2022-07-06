
<?php
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from etablissements");
?>
<h1>Ajouter un établissement</h1>
<form action="index.php?page=ajouterEtabEnseignant&idEnseignant=<?=$_GET['idEnseignant']?>" method="post">
    <div>
    <label for="id_etablissement">Nom de l'etablissement :</label>
        <select name="id_etablissement" id="id_etablissement">
            <?php for ($i = 0; $i < count($tblQuery); $i++) {
            ?>
                <option value="<?= $tblQuery[$i]['id_etablissement'] ?>"><?= $tblQuery[$i]['nom_etablissement'] ?></option>
            <?php  } ?>
        </select>        
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Envoyer" />
    </div>
    <input type="hidden" name="frmAjouterEtabEnseignant" />
</form>
