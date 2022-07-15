
<?php

//var_dump(isset($_POST['frmUpdate']));

if (isset($_POST['frmUpdateSalle'])) {
   // $message = "Je viens du formulaire";

    $nom = htmlentities(trim($_POST['nom']));
    $caracteristique = htmlentities(trim($_POST['caracteristique']));
    $id = htmlentities(trim($_POST['id']));

//   var_dump($_POST['nom']);
//   var_dump($_POST['id']);

    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque vore nom");
    };
    if (mb_strlen($caracteristique) === 0)
        array_push($erreurs, "Il manque vore caracteristique");
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/frmUpdateSalle.php';
    } else {

        $requete = "UPDATE salles set nom_salle='$nom', caracteristique ='$caracteristique'
            where id_salle = '$id';";
           
        
        $sqlUpdate = new Sql();
        $sqlUpdate->inserer($requete); 
        $url = "index.php?page=listeSalle";
        echo redirection($url);
    }


} else {

    //var_dump(($_POST['frmUpdate']));

    // $nom = $prenom = $mail = "";
     include './includes/frmUpdateSalle.php';
    //echo $message;
}

//   displayMessage("!");
?>