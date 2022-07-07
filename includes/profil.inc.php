<head>
  <link rel="stylesheet" href="./assets/css/profil.css">
</head>

<?php

if (!isset($_GET['id'])) {
    include 'listeenseignant.inc.php';
     //header('Location:./index.php');
}

?>
<body>

<h1>profil</h1>
<form action="index.php?page=updateprofil" method="POST">
    <div>
        <?php 
        $sqlQuery = new Sql();
        // $query->prepare($requeteEnseignant);
        $tblQuery = array();
        $tblQuery = $sqlQuery->lister("select * from comptes");
        $querySelect = new Sql();
        $requete = 'SELECT * FROM enseignants where id_enseignant = ' . $_GET['id'].";";
        $professeur = $querySelect->lister($requete);
        //dump($professeur);
        ?>
      <label>Prenom</label>
      <input type="text" name="prenom" id="prenom" value="<?= $professeur[0]['prenom'] ?>">   
      <label>Nom</label>
      <input type="text" name="nom" id="nom" value="<?= $professeur[0]['nom'] ?>"> 
      <label>Date de naissance</label>
      <input type="date" name="d_naissance" id="d_naissance" value="<?= $professeur[0]['date_naissance'] ?>">  
      <label>Email</label>
      <input type="text" name="email" id="email" value="<?= $professeur[0]['email'] ?>" > 
      <label>identifiant</label>
      <input type="text" name="identifiant" id="identifinat" value="<?= $professeur[0]['identifiant'] ?>">  
      <label>id_comptes</label>
      <select name="id_compte" id="id_compte" >
        <?php for($i=0; $i <count($tblQuery) ; $i++) { 
            ?>
            <option><?=$tblQuery[$i]['id_compte'] ?>-<?=$tblQuery[$i]['email']?></option>
       <?php  } ?>
        </select>
      <label>telephone</label>
      <input type="telephone" name="telephone" id="telephone"value="<?= $professeur[0]['telephone'] ?>"> 
      <label>Mot de passe</label>
      <input type="password" name="password" value="password" >
      <input type="submit" id='submit' value='envoyer'>
    </div>
    <input type="hidden" id="id_enseignant" name="id_enseignant" value="<?= $professeur[0]['id_enseignant'] ?>">
    <input type="hidden" id="frmprofil" name="frmprofil">
  </form>
</div>

</body>