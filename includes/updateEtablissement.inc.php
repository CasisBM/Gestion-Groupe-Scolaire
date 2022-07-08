
<?php

if (isset($_POST['frmUpdateEtablissement'])) {

    $nom = htmlentities(trim($_POST['nom_etablissement']));
    $ville = htmlentities(trim($_POST['ville']));
    $id = htmlentities(trim($_POST['id']));

    $erreurs = array();

    if (mb_strlen($nom) === 0) {
        array_push($erreurs, "Il manque le nom de l'etablissement");
    };
    if (mb_strlen($ville) === 0)
        array_push($erreurs, "Il manque la ville");
    
    if (count($erreurs)) {

        $messageErreur = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .= "</ul>";
        echo $messageErreur;
        include './includes/frmUpdateEtablissement.php';
    } else {

        $requete = "UPDATE etablissements set nom_etablissement='$nom', ville ='$ville' where id_etablissement = '$id';";
           
        
        $sqlUpdate = new Sql();
        $sqlUpdate->inserer($requete); 
        $url = "index.php?page=choixEtablissement";
        echo redirection($url);
    }


} else {

    include './includes/frmUpdateEtablissement.php';
}

?>