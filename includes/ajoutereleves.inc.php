<?php 
if(isset($_POST["frmAjoutereleves"]))
{
    //echo "Je viens du formulaire ajoutereleves";
    $id_etablissement = strstr(htmlentities(trim($_POST['id_etablissement'])),'-',true);
    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $mail = htmlentities(trim($_POST['mail']));
    $identifiant = htmlentities(trim($_POST['identifiant']));
    $promotion = htmlentities(trim($_POST['promotion']));
    $compte = htmlentities(trim($_POST['compte']));
   

    $erreurs = array();

    if(mb_strlen($id_etablissement) === 0)
    array_push($erreurs, "Il manque l'id_etablissement");

    if(mb_strlen($nom) === 0)
    array_push($erreurs, "Il manque le nom");

    if(mb_strlen($prenom) === 0)
    array_push($erreurs, "Il manque le prenom");
    
    if(mb_strlen($identifiant) === 0)
    array_push($erreurs, "Il manque l'identifiant");
    
    if(mb_strlen($promotion) === 0)
    array_push($erreurs, "Il manque le promo");
    
    if(mb_strlen($compte) === 0)
    array_push($erreurs, "Il manque compte");
    


    if(mb_strlen($mail) === 0 )
    {
    array_push($erreurs, "Il manque l'e-mail");
    }
    elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        # code...
        array_push($erreurs, "e-mail invalide");
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
        include './includes/frmajoutereleves.php';
    }
    else{
        
        
        

            $requete = "INSERT INTO eleves (id_eleve, nom, prenom, email ,identifiant,id_promotion,id_compte) 
            VALUES (NULL, '$nom', '$prenom', '$mail','$identifiant','$promotion','$compte');";
           //var_dump($requete);          
            $queryInsert = new Sql();
            $queryInsert->inserer($requete);

           // header('Location:./index.php?page=login');

       
    }

}
else{
    //echo "Je ne viens pas du formulaire";
    $nom = $prenom =$email =$identifiant ="";
   include './frmajoutereleves.php';
   
}
?>