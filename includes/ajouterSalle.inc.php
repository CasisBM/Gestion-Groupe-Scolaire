<?php

if (isset($_POST['frmAjouterSalle'])) {

    $nom = htmlentities(trim($_POST['nom']));
    $caracteristique = htmlentities(trim($_POST['caracteristique']));
    
    $id_etablissement = strstr(htmlentities(trim($_POST['id_etablissement'])), '-', TRUE);


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
        include './includes/frmAjouterSalle.php';
    } else {
    
        $requete = "INSERT INTO salles (id_salle,id_etablissement,nom_salle,caracteristique) VALUES(NULL,'$id_etablissement','$nom','$caracteristique');";
        $queryInsert = new Sql();
        $queryInsert->inserer($requete);  
        redirection("index.php?page=listeSalle");
    }


} else {

    

    
     include './includes/frmAjouterSalle.php';

}

?>