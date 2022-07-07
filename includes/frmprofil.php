<?php
spl_autoload_register(function ($class) {
  require '../classes/' . $class . '.php';
});

$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->lister("select * from comptes");
?>
<div id="profiles">
  <form action="../index.php?page=updateprofil" method="POST" required>
    <label>Prenom</label>
    <input type="text" placeholder="Entrer Prenom" name="prenom">
    <label>Nom</label>
    <input type="text" placeholder="Entrer Name" name="nom">
    <label>date </label>
    <input type="date" placeholder="Entrer Date de naissance" name="date_naissance" id="date_naissance">
    <label>Email</label>
    <input type="text" placeholder="Entrer Email" name="email">
    <label>telephone</label>
    <input type="tel" placeholder="Entrer telephone" name="telephone">
    <label>id_comptes</label>
    <select name="id_compte" id="id_compte">
      <?php for ($i = 0; $i < count($tblQuery); $i++) {
      ?>
        <option><?= $tblQuery[$i]['id_compte'] ?>-<?= $tblQuery[$i]['email'] ?></option>
      <?php  } ?>
    </select>
    <label>identifiant</label>
    <input type="text" placeholder="Entrer identifiant" name="identifiant">
    <label>Mot de passe</label>
    <input type="text" placeholder="Entrer Mot de passe" name="password">
    <input type="submit" id='submit' value='envoyer'>
    <input type="hidden" id="frmprofil" name="frmprofil">
  </form>
</div>
