<?php
spl_autoload_register(function($className){
  
   require '../../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from etablissements");

?>
<form action="../../index.php?page=ajouteSalle" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"  />
    </div>
    <div>
        <label for="caracteristique">caracteristique :</label>
        <input type="text" id="caracteristique" name="caracteristique"  />
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
        <input type="submit" value="Ajoute" />
    </div>
    <input type="hidden" name="frmSalle" />
</form>