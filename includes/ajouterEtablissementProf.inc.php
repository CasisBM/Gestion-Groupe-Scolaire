<?php 
echo "4;";
if(isset($_POST["frmAjouterEtablissementProf"]))
{
    $idEtablissement = $_POST['id_etablissement'];
    $admin = new Admin();
    $admin-> ajouterEtablissementHasProf($idEtablissement,$_GET['idProf']);

}
else{
    //echo "Je ne viens pas du formulaire";
    include './includes/frmAjouterEtablissementProf.php';
}
?>
