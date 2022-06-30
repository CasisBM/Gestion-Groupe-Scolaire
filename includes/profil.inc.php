<?php
    if (isset($_POST['profil'])) {
        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $mail = htmlentities(trim($_POST['mail']));
        $password1 = htmlentities(trim($_POST['password']));
        

        $erreurs = array();

        if (mb_strlen($nom) === 0)
            array_push($erreurs, "Il manque votre nom");

        if (mb_strlen($prenom) === 0)
            array_push($erreurs, "Il manque votre prénom");

        if (mb_strlen($mail) === 0)
            array_push($erreurs, "Il manque votre e-mail");

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

            include './includes/profil.php';
        }

        else {
            
   
    $requete ="INSERT INTO profil (nom ,prenom,email,passeword) 
    values (, 'nom','prenom', 'email','password');";
    // var_dump($requete);
    $queryInsert = new Sql();
    $queryInsert->inserer($requete);
            
 }
        }
    
    
    else{
     
        $nom = $prenom = $mail = "";
        include './includes/profil.php';
    }