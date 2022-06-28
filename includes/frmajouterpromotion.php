 <?php 
 spl_autoload_register(function($className){

  require '../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from etablissements");
 ?>
 <form action="../index.php?page=ajouterpromotion" method="post">
   
    <div>
        <label for="nom_promotion">nom promotion:</label>
        <input type="text" id="nom" name="nom_promotion" />
    </div>
    <div>
        <label for="annee_promotion">annee promotion:</label>
        <input type="text" id="annee_promotion" name="annee_promotion" />
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
        <input type="submit" value="Ajouter promotion" />
    </div>
    <input type="hidden" name="frmajouterpromotion" />
</form>