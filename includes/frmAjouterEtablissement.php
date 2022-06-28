<h1>Ajouter un établissement</h1>
<form action="index.php?page=ajouterEtablissement" method="post">
    <div>
        <label for="nom">Nom de l'établissement :</label>
        <input type="text" name="nom" id="nom" value="<?= $nom; ?>" />
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Envoyer" />
    </div>
    <input type="hidden" name="frmAjouterEtablissement" />
</form>