<?php
spl_autoload_register(function($className){
  
   require '../../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from etablissement");

?>
<form action="index.php?page=ajouteSalle" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?=$users[0]['nom']?>" />
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?=$users[0]['prenom'] ?>" />
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="text" id="mail" name="mail" value="<?=$users[0]['mail'] ?>" />
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" />
    </div>
    <div>
        <label for="password1">Mot de passe (vérification) :</label>
        <input type="password" id="password1" name="password1" />
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Update" />
    </div>
    <input type="hidden" name="id" id="id" value=<?=$users[0]['id_utilisateur']?>>
    <input type="hidden" name="frmSalle" />
</form>