<?php 

if(isset($_POST["frmAjouterEtablissementProf"]))
{
    $idEtablissement = $_POST['id_etablissement'];
    $admin = new Admin();
    $admin-> ajouterEtablissementHasProf($idEtablissement,$_GET['idProf']);
    redirection('index.php?page=listeEtablissement&idProf='.$_GET['idProf']);

}
else{
    //echo "Je ne viens pas du formulaire";
    include './includes/frmAjouterEtablissementProf.php';
}
?>
