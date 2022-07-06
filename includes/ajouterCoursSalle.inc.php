
<?php 

if(isset($_POST["frmAjouterCoursSalle"]))
{
    $id_enseignant = htmlentities(trim($_POST['id_enseignant']));
    $date = htmlentities(trim($_POST['date']));
    $heure_debut = htmlentities(trim($_POST['heure_debut']));
    $heure_fin = htmlentities(trim($_POST['heure_fin']));
    $id_matiere = htmlentities(trim($_POST['id_matiere']));
    $id_promotion = htmlentities(trim($_POST['id_promotion']));
    


    $id_salle = $_GET['idSalle'];
    $requete ="INSERT INTO cours (id_salle,id_matiere,id_promotion,id_enseignant,date,heure_debut,heure_fin) 
    values ('$id_salle','$id_matiere','$id_promotion','$id_enseignant','$date','$heure_debut','$heure_fin');";
    $queryInsert = new Sql();
    $queryInsert->inserer($requete);
    $url = "index.php?page=planningSalle&idSalle=".$_GET['idSalle'] ;
    echo redirection($url);


}
else{
    include './includes/frmAjouterCoursSalle.php';
}
?>
