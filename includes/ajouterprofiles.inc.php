
<?php

    if (isset($_POST['frmprofil'])) {
        $prenom = htmlentities(trim($_POST['prenom']));
        $nom = htmlentities(trim($_POST['nom']));
       
        $telephone = htmlentities(trim($_POST['telephone']));
        $date_naissance = htmlentities(trim($_POST['date_naissance']));
        $email = htmlentities(trim($_POST['email']));
        $identifiant = htmlentities(trim($_POST['identifiant']));
        $password = htmlentities(trim($_POST['password']));
        $compte = htmlentities(trim($_POST['id_compte']));

        $erreurs = array();

        if (mb_strlen($nom) === 0)
            array_push($erreurs, "Il manque votre nom");

        if (mb_strlen($prenom) === 0)
            array_push($erreurs, "Il manque votre prénom");

        if (mb_strlen($email) === 0)
            array_push($erreurs, "Il manque votre e-mail");

        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            array_push($erreurs, "Votre adresse mail n'est pas conforme");

        if (mb_strlen($password) === 0 )
            array_push($erreurs, "Veuillez saisir votre mot de passe et sa confirmation");
      

        if (count($erreurs)) {
            $messageErreur = "<ul>";

            for($i = 0 ; $i < count($erreurs) ; $i++) {
                $messageErreur .= "<li>";
                $messageErreur .= $erreurs[$i];
                $messageErreur .= "</li>";
            }
    
            $messageErreur .= "</ul>";
    
            echo $messageErreur;

            include './includes/frmprofil.php';
        }

        else {
            $password = password_hash($password, PASSWORD_DEFAULT);
           
            $requete = "INSERT INTO enseignants (id_enseignant, prenom, nom, email, date_naissance, identifiant,telephone,password,id_compte)
            VALUES (NULL, '$nom', '$prenom','$email','$date_naissance',' $identifiant','$telephone', '$password','$compte');";

            $queryInsert = new Sql();
            $queryInsert->inserer($requete);

            header('Location:./index.php?page=profiles');

            // displayMessage("Requête OK");
            }
        }
    
    
    else {
        $nom = $prenom = $mail = "";
        include './includes/frmProfil.php';
    }