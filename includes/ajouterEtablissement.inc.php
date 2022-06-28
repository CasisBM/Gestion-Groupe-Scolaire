<?php 
if(isset($_POST["frmAjouterEtablissement"]))
{
    $nom = htmlentities(trim($_POST['nom']));


    $erreurs = array();

    if(mb_strlen($nom) === 0)
    array_push($erreurs, "Il manque le nom de l'etablissement");

    
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
        include './includes/frmAjouterEtablissement.php';
    }
    else{
        $admin = new Admin();
        $admin-> ajouterEtablissement($nom);
    }

}
else{
    //echo "Je ne viens pas du formulaire";
    $identifiant = $nom = $prenom = $mail = "";
    include './includes/frmAjouterEtablissement.php';
}
?>
