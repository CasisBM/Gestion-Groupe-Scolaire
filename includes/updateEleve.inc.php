
<?php

if (isset($_POST['frmUpdateEleve'])) {

    $identifiant = htmlentities(trim($_POST['identifiant']));
    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $email = htmlentities(trim($_POST['email']));
    $id = htmlentities(trim($_POST['idEleve']));

    $erreurs = array();

    if (mb_strlen($identifiant) === 0) {
        array_push($erreurs, "Il manque vore identifiant");
    };
    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque vore nom");
    };
    if (mb_strlen($prenom) === 0)
        array_push($erreurs, "Il manque vore prenom");
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/frmUpdateEleve.php';
    } else {

        $requete = "UPDATE eleves set identifiant = '$identifiant',nom='$nom', prenom ='$prenom'
            where id_eleve = '$id';";
           
        
        $sqlUpdate = new Sql();
        $sqlUpdate->inserer($requete); 
        $url = "index.php?page=listeEleve";
        echo redirection($url);
    }


} else {
    include './includes/frmUpdateEleve.php';
}

?>