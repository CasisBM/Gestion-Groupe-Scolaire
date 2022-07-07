
<?php 

if(isset($_POST["frmAjouterCoursPromotion"]))
{
    $id_enseignant = htmlentities(trim($_POST['id_enseignant']));
    $date = htmlentities(trim($_POST['date']));
    $heure_debut = htmlentities(trim($_POST['heure_debut']));
    $heure_fin = htmlentities(trim($_POST['heure_fin']));
    $id_matiere = htmlentities(trim($_POST['id_matiere']));
    $id_salle = htmlentities(trim($_POST['id_salle']));
    


    $id_promotion = $_GET['idPromotion'];
    $requete ="INSERT INTO cours (id_promotion,id_matiere,id_salle,id_enseignant,date,heure_debut,heure_fin) 
    values ('$id_promotion','$id_matiere','$id_salle','$id_enseignant','$date','$heure_debut','$heure_fin');";
    $queryInsert = new Sql();
    $queryInsert->inserer($requete);
    $url = "index.php?page=planningPromotion&idPromotion=".$_GET['idPromotion'] ;
    echo redirection($url);


}
else{
    include './includes/frmAjouterCoursPromotion.php';
}
?>
