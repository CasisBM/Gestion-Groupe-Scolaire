
<?php
if (isset($_POST['frmAjouterMatiere']))
{

    $nom_matiere =htmlentities(trim($_POST['nom_matiere']));
    $queryInsert = new Sql();
    $requete = "SELECT nom_matiere FROM matieres WHERE nom_matiere = '$nom_matiere'";
    if(empty($queryInsert->lister($requete)))
    {
        $requete ="INSERT INTO matieres (nom_matiere) values ('$nom_matiere');";
        $queryInsert->inserer($requete);
        $url = "index.php?page=ajouterMatiere&idEnseignant=".$_GET['idEnseignant'];
        echo redirection($url);
         
    }
    else
    {
        echo "Cette matiere existe deja";
        include './includes/frmAjouterMatiere.php';
    }
}
else if(isset($_POST['frmAjouterMatiereEnseignant']))
{
    $id_matiere =htmlentities(trim($_POST['id_matiere']));
    $id_enseignant = $_GET['idEnseignant'];
    $requete ="INSERT INTO ENSEIGNANTS_has_MATIERES (id_matiere,id_enseignant) values ('$id_matiere','$id_enseignant');";
    $queryInsert = new Sql();
    $queryInsert->inserer($requete);
    $url = "index.php?page=listeMatiere&idEnseignant=".$_GET['idEnseignant'] ;
    echo redirection($url);
}
else
{
      include './includes/frmAjouterMatiere.php';
}