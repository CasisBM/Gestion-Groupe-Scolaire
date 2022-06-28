<h1>Ajouter un eleve</h1>
<?php 
 spl_autoload_register(function($className){

  require '../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();
$tblQuery = $sqlQuery->lister("select * from etablissements");
 ?>
<form action="index.php?page=ajouterProf" method="post">
   
    
    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $nom; ?>" />
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $prenom; ?>" />
    </div>
    <div>
        <label for="mail">E-mail :</label>
        <input type="text" name="mail" id="mail" value="<?= $mail; ?>" />
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" />
    </div>
    <div>
        <label for="id_etablissement">id_etablissement  :</label>
        <select name="id_etablissement" id="id_etablissement" >
        <?php for($i=0; $i <count($tblQuery) ; $i++) { 
            ?>
            <option><?=$tblQuery[$i]['id_etablissement'] ?>-<?=$tblQuery[$i]['nom_etablissement']?></option>
       <?php  } ?>
        </select>
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Ajouter eleves" />
    </div>
    <input type="hidden" name="frmAjoutereleves" />
</form>