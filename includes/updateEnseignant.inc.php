
<?php

//var_dump(isset($_POST['frmUpdate']));

if (isset($_POST['frmUpdateEnseignant'])) {
   // $message = "Je viens du formulaire";

    $identifiant = htmlentities(trim($_POST['identifiant']));
    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $email = htmlentities(trim($_POST['email']));
    $id = htmlentities(trim($_POST['idEnseignant']));

//   var_dump($_POST['nom']);
//   var_dump($_POST['id']);

    $erreurs = array();

    if (mb_strlen($identifiant) === 0) {
        array_push($erreurs, "Il manque vore identifiant");
    };
    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque vore nom");
    };
    if (mb_strlen($prenom) === 0)
        array_push($erreurs, "Il manque vore prenom");
    //ajoute verifier l'email
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/frmUpdateEnseignant.php';
    } else {

        $requete = "UPDATE enseignantS set identifiant = '$identifiant',nom='$nom', prenom ='$prenom'
            where id_enseignant = '$id';";
           
        
        $sqlUpdate = new Sql();
        $sqlUpdate->inserer($requete); 
        $url = "index.php?page=listeEnseignant";
        echo redirection($url);
    }


} else {
     include './includes/frmUpdateEnseignant.php';
}

?>