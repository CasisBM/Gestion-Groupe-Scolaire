<?php
    if (isset($_POST['frmprofil'])) {
        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $date = htmlentities(trim($_POST['date']));
        $mail = htmlentities(trim($_POST['mail']));
        $identifiant = htmlentities(trim($_POST['identifiant']));
        $password1 = htmlentities(trim($_POST['password']));
        

        $erreurs = array();

        if (mb_strlen($nom) === 0)
            array_push($erreurs, "Il manque votre nom");

        if (mb_strlen($prenom) === 0)
            array_push($erreurs, "Il manque votre prénom");
            if (mb_strlen($date) === 0)
            array_push($erreurs, "Il manque votre date naissance");

        if (mb_strlen($mail) === 0)
            array_push($erreurs, "Il manque votre e-mail");
            if (mb_strlen($identifiant) === 0)
            array_push($erreurs, "Il manque votre identifinat");
            if (mb_strlen($password) === 0)
            array_push($erreurs, "Il manque votre mot de passe");


        elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL))
            array_push($erreurs, "Votre adresse mail n'est pas conforme");

        if (mb_strlen($password) === 0 )
            array_push($erreurs, "Veuillez saisir votre mot de passe et sa confirmation");
        
        if (count($erreurs)) {
            $messageErreur = "<ul>";

            for($i = 0 ; $i < count($erreurs) ; $i++)
             {
                $messageErreur .= "<li>";
                $messageErreur .= $erreurs[$i];
                $messageErreur .= "</li>";
            }
    
          echo $messageErreur;

            include './includes/frmprofil.php';
        }

        else {
            
   
            $requeteprofil = "SELECT * FROM enseignants ";
          
             $sqlProfil = new Sql();
            $resultatProfil = $sqlProfil->lister($requeteprofil);
            //header('Location:./index.php?page=profil');
            
            
            }
            
 }
        
    
    
    else {
     
        $nom = $prenom = $mail = "";
        include './includes/frmprofil.php';
    }