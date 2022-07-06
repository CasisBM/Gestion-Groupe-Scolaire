<?php 

if(isset($_POST["frmAjouterEtabEnseignant"]))
{
    $idEtablissement = $_POST['id_etablissement'];
    $admin = new Admin();
    $admin-> ajouterEtablissementHasEnseignant($idEtablissement,$_GET['idEnseignant']);
    redirection('index.php?page=listeEtablissement&idEnseignant='.$_GET['idEnseignant']);

}
else{
    //echo "Je ne viens pas du formulaire";
    include './includes/frmAjouterEtabEnseignant.php';
}
?>
