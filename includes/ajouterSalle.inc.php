<?php

//var_dump(isset($_POST['frmUpdate']));

if (isset($_POST['frmAjouterSalle'])) {
   // $message = "Je viens du formulaire";

    $nom = htmlentities(trim($_POST['nom']));
    $caracteristique = htmlentities(trim($_POST['caracteristique']));
    
    $id_etablissement = strstr(htmlentities(trim($_POST['id_etablissement'])), '-', TRUE);

   //var_dump($_POST['nom']);
   //var_dump($id_etablissement);

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
    //var_dump($requete);
         $sqlInserer = new Sql();
         $sqlInserer->inserer($requete);  
         redirection("index.php?page=listeSalle");
    }


} else {

    

    
     include './includes/frmAjouterSalle.php';
    //echo $message;
}

//   displayMessage("!");
?>