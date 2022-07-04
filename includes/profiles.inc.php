
<?php

if (!isset($_GET['id'])) {
    include 'listeprofesseur.inc.php';
    // header('Location:./index.php');
}

?>
<body>
<form action="../index.php?page=profiles" method="POST">
    <div>
        <?php 
        $query = new Sql();
        $requete = 'SELECT * FROM enseignants where id_enseignant = ' . $_GET['id'];
        
        $querySelect = new Sql();
        $professeur = $querySelect->lister($requete);
        ?>
      <label>Prenom</label>
      <input type="text" placeholder="<?=$professeur[0]['prenom'] ?>" name="prenom"  >
      <label>Nom</label>
      <input type="text" placeholder="<?=$professeur[0]['nom'] ?>" name="nom"  >
      <label>Date de naissance</label>
      <input type="text" placeholder="<?=$prfesseeur[0]['date_naissance']?>" name="date"  >
      <label>Email</label>
      <input type="text" placeholder="<?=$professeur[0]['email'] ?>" name="email"  >
      <label>identifiant</label>
      <input type="text" placeholder="<?=$professeur[0] ['identifiant']?>" name="identifiant"  >
      <label>Mot de passe</label>
      <input type="text" placeholder="Entrer Mot de passe" name="password"  >
      <input type="submit" id='submit' value='envoyer'>
    </div>
    <input type="hidden" id="frmprofil" name="frmprofil">
  </form>
</div>

</body>