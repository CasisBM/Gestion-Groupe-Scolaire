
<?php 

if(isset($_POST["frmAjouterCoursEnseignant"]))
{
    $id_salle = htmlentities(trim($_POST['id_salle']));
    $date = htmlentities(trim($_POST['date']));
    $heure_debut = htmlentities(trim($_POST['heure_debut']));
    $heure_fin = htmlentities(trim($_POST['heure_fin']));
    $id_promotion = htmlentities(trim($_POST['id_promotion']));
    $id_matiere = htmlentities(trim($_POST['id_matiere']));

    $id_enseignant = $_GET['idEnseignant'];
    $requete ="INSERT INTO cours (id_salle,id_matiere,id_promotion,id_enseignant,date,heure_debut,heure_fin) 
    values ('$id_salle','$id_matiere','$id_promotion','$id_enseignant','$date','$heure_debut','$heure_fin');";
    $queryInsert = new Sql();
    $queryInsert->inserer($requete);
    $url = "index.php?page=planningEnseignant&idEnseignant=".$_GET['idEnseignant'] ;
    echo redirection($url); 

}
else{
    include './includes/frmAjouterCoursEnseignant.php';
}
?>
