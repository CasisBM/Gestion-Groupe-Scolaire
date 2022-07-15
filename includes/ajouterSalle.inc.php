<?php

if (isset($_POST['frmAjouterSalle'])) {

    $nom = htmlentities(trim($_POST['nom']));
    $caracteristique = htmlentities(trim($_POST['caracteristique']));
    
    $id_etablissement = htmlentities(trim($_POST['id_etablissement']));


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
        $queryInsert = new Sql();
        $requete = "SELECT nom_salle FROM salles WHERE id_etablissement = $id_etablissement;";
        $resultQuery = $queryInsert->lister($requete); 

        if(isset($nomSalle) || $resultQuery[0]['nom_salle'] !== $nom )
        {
            
            $requete = "INSERT INTO salles (id_salle,id_etablissement,nom_salle,caracteristique) 
            VALUES(NULL,'$id_etablissement','$nom','$caracteristique');";  
            $queryInsert->inserer($requete);  
            redirection("index.php?page=listeSalle");
        }
        else
        {
            echo 'Cette salle existe deja';
            include './includes/frmAjouterSalle.php';
        }
    }

} else {
  
     include './includes/frmAjouterSalle.php';

}

?>