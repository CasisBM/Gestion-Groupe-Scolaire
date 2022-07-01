<h1>planning eleves</h1>

<?php
   
if (isset($_POST['frmPlannigEleve'])){

  
$id_matiere =htmlentities(trim($_POST['id_matire']));
$heure =strstr(htmlentities(trim($_POST['heure'])),'-',true);
$date = htmlentities(trim($_POST['date']));
$id_Salle = htmlentities(trim($_POST['sale']));
$id_professeur = htmlentities(trim($_POST['id_professeur']));
$ecole = htmlentities(trim($_POST['ecole']));
$action = htmlentities(trim($_POST['action']));

$erreurs = array();



if(mb_strlen($id_matiere)===0)
array_push($erreurs ,'il manque votre nom de matiere');
if (mb_strlen($heure)===0)
array_push($erreurs ,'il manque heure');
if (mb_strlen($date)===0)
array_push($erreurs ,'il manque la date');
if (mb_strlen($id_salle)===0)
array_push($erreurs ,'il manque la salle');
if (mb_strlen($id_professeur)===0)
array_push($erreurs ,'il manque le professeur');
if (mb_strlen($id_ecole)===0)
array_push($erreurs ,'il manque le  nom de ecole');
if (mb_strlen($action)===0)
array_push($erreurs ,'il manque action');

elseif (mb_strlen($planning_eleve)===0)
array_push($erreurs, "Votre planning eleve");

if(count($erreurs)){
$messageErreur = "<ul>";

for($i=0;$i<count($erreurs) ;$i++) {
    $messageErreur .="<l>";
    $messageErreur .=$erreurs[$i];
    $messageErreur .= "</li>";
}
    echo $messageErreur;
    include './includes/frmplanningeleve.php';

  }

  else { 
        $requete ="INSERT INTO planning eleve (id_planning ,id_matiere,heure,dat,id_salle,id_professeur,id_ecole,act) 
        values (null, '$id_matiere','$heure', '$date','$id_salle','$id_professeur','$id_ecole','$action');";
         var_dump($requete);
      /*   $queryInsert = new Sql();
        $queryInsert->inserer($requete);
      */
  }
  }
  
  
  
  else {
      $id_matire = $heure= $date = $id_salle= $id_professeur=$id_ecole=$action="";
      include './frmplanningeleve.php';
      //include './includes/frmajouterpromotion.php';
  }

/* 






//<?php require './includes/admin/header.php'; ?>
    <input type="date" min="2022-01-01" max="2025-01-01">
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="7">Planning (Nom Eleve)</th>
                </tr>
                <tr>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Matiere</th>
                <th>Date</th>
                <th>Horaires</th>
                <th>Salles</th>
                <th>Professeur</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Maths</td>
                <td>11/05/2022</td>
                <td>17:30 - 19:00</td>
                <td>306</td>
                <td>Cedric DURON</td>
                <td>Ecole 00</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Anglais</td>
                <td>12/05/2022</td>
                <td>16:30 - 17:30</td>
                <td>PEUPLIER</td>
                <td>Jean-louis DE LA ROCHE</td>
                <td>Ecole 2</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
      
              <tr>
                <td>Histoire</td>
                <td>13/05/2022</td>
                <td>13:00 - 14:00</td>
                <td>ERABLE</td>
                <td>Emilie Bocase</td>
                <td>Ecole 3</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="7">
                  <div class="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button class="buttonTable" type="button"> Ajouter un cours </button></div>
                </td>
              </tr>
            </tfoot>
            </table>  */
