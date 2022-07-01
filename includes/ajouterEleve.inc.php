
<?php 

if(isset($_POST["frmAjouterEleve"]))
{
    $identifiant = htmlentities(trim($_POST['identifiant']));
    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $mail = htmlentities(trim($_POST['mail']));
    $password = htmlentities(trim($_POST['password']));
    $id_promotion = htmlentities(trim($_POST['id_promotion']));
    

    $erreurs = array();

    if(mb_strlen($identifiant) === 0)
    array_push($erreurs, "Il manque l'identifiant");

    if(mb_strlen($nom) === 0)
    array_push($erreurs, "Il manque le nom");

    if(mb_strlen($prenom) === 0)
    array_push($erreurs, "Il manque le prenom");


    if(mb_strlen($mail) === 0 )
    {
        array_push($erreurs, "Il manque l'e-mail");
    }
    elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        # code...
        array_push($erreurs, "e-mail invalide");
    }

    if(mb_strlen($password) === 0)
    {
        array_push($erreurs, "Il manque le mot de passe");
    }
    
    if(count($erreurs))
    {
        $messageErreur = "<ul>";
        for ($i=0; $i < count($erreurs); $i++) { 
            # code...
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";

        echo $messageErreur;
        include './includes/frmAjouterEleve.php';
    }
    else{
        $admin = new Admin();
        $admin-> ajouterEleve($identifiant,$password,$nom,$prenom,$mail,$id_promotion);
        $url = "index.php?page=listeEleve";
        echo redirection($url);
    }

}
else{
    $identifiant = $nom = $prenom = $mail = "";
    include './includes/frmAjouterEleve.php';
}
?>
