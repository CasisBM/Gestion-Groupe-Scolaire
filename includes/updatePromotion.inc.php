
<?php

//var_dump(isset($_POST['frmUpdate']));

if (isset($_POST['frmUpdatePromotion'])) {
   // $message = "Je viens du formulaire";

    $nom = htmlentities(trim($_POST['nom']));
    $annee = htmlentities(trim($_POST['annee']));
    $id_etablissement = strstr(htmlentities(trim($_POST['id_etablissement'])), '-', TRUE);
    $id = htmlentities(trim($_POST['id']));

//   var_dump($_POST['nom']);
//   var_dump($_POST['id']);

    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque vore nom");
    };
    if (mb_strlen($annee) === 0)
        array_push($erreurs, "Il manque la année");
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/frmUpdatePromotion.php';
    } else {

        $requete = "UPDATE promotions set nom_promotion='$nom', annee ='$annee', id_etablissement='$id_etablissement'
            where id_promotion = '$id';";
           
        
        $sqlUpdate = new Sql();
        $sqlUpdate->inserer($requete); 
        $url = "index.php?page=listePromotion";
        echo redirection($url);
    }


} else {

    //var_dump(($_POST['frmUpdate']));

    // $nom = $prenom = $mail = "";
     include './includes/frmUpdatePromotion.php';
    //echo $message;
}

//   displayMessage("!");
?>