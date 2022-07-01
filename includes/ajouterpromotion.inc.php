<h1>ajouter promotion</h1>

<?php
   
if (isset($_POST['frmAjouterPromotion'])){

  
$nom_promotion =htmlentities(trim($_POST['nom_promotion']));
$id_etablissement =strstr(htmlentities(trim($_POST['id_etablissement'])),'-',true);
$annee_promotion = htmlentities(trim($_POST['annee_promotion']));

$erreurs = array();



if(mb_strlen($nom_promotion)===0)
array_push($erreurs ,'il manque votre nom de promotion');
if (mb_strlen($id_etablissement)===0)
array_push($erreurs ,'il manque votre id etablissement');

elseif (mb_strlen($annee_promotion)===0)
array_push($erreurs, "Votre annee de annee_promotion");

if(count($erreurs)){
$messageErreur = "<ul>";

for($i=0;$i<count($erreurs) ;$i++) {
    $messageErreur .="<l>";
    $messageErreur .=$erreurs[$i];
    $messageErreur .= "</li>";
}
    echo $messageErreur;
    include './includes/frmAjouterPromotion.php';

  }

  else { 

        $requete ="INSERT INTO promotions (nom_promotion,id_etablissement,annee) values ('$nom_promotion','$id_etablissement','$annee_promotion');";
        dump($requete);
        $queryInsert = new Sql();
        $queryInsert->inserer($requete);
        $url = "index.php?page=listePromotion";
        echo redirection($url);
     
  }
  }
  
  
  
  else {
      $nom = $id_promotion = $nom_promotion = $id_etablissemnt= $annee_promotion="";
      include './includes/frmAjouterPromotion.php';
  }