<?php 

//header('Location: index.php?page=accueil');
if(isset($_POST["frmLogin"]))
{
    $password = htmlentities($_POST['password']);

    $erreurs = array();

    if(mb_strlen($password) === 0)
    array_push($erreurs, "Il manque votre mot de passe");

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
        include './includes/frmLogin.php';
    }
    else
    {
        header('Location: index.php?page=choix etablissement');
    }

}
else{
    //echo "Je ne viens pas du formulaire";
/*     $mail = ""; */
    include './includes/frmLogin.php';
}

?>