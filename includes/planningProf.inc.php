<h1>planning Promotion</h1>

<?php
   
if (isset($_POST['frmPlannigpromotion'])){

  
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
    include './includes/frmplanningpromotion.php';

  }

  else { 
        $requete ="INSERT INTO planning promotion (id_planning ,id_matiere,heure,dat,id_salle,id_professeur,id_ecole,act) 
        values (null, '$id_matiere','$heure', '$date','$id_salle','$id_professeur','$id_ecole','$action');";
         //var_dump($requete);
         $queryInsert = new Sql();
        $queryInsert->inserer($requete);
      
  }
  }








/* <!-- <?php
spl_autoload_register(function ($class) {
    require '../classes/' . $class . '.php';
});

$sqlQuery = new Sql();
$tblQuery = $sqlQuery->lister("select * from planning prof");


?>
<?php require 'header.php'; ?>
            <!--/Table plannig prof-->
            <table>
              <thead>
                <tr>
                  <th class="nomTable" colspan="5">planning prof</th>
                </tr>
                <tr>
                  <th colspan="5">
                    <div class="search">
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                      </div>
                  </th>
                </tr>
                
               </div>
              <tr class="titreTable">
                <th>Matiere</th>
                <th>Date</th>                
                <th>Heure</th>
                <th>Salle</th>
                <th>Professeur</th>
                <th>Ecole</th>
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
            </thead>
            <tbody>
            <?php for ($i=0; $i <count($tblQuery) ; $i++) { ?>
              <tr>
                <td><?=$tblQuery[$i]['prenom']?><?=' '?><?=$tblQuery[$i]['nom']?></td>
                <td><i class="fa-solid fa-circle-user fa-2x"></i></td>
                <td>
                  <a href="planningprof.html">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                  </a>
                </td>
                <td>Ecole 1</td>
                <td>
                  <i class="fa-solid fa-pen"></i>
                  <i class="fa-solid fa-trash" href="index.php?page=supp&class="></i>
                </td>
              </tr>
              <?php } ?>
             
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="5">
                  <div class="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button class="buttonTable"type="button"> Ajouter planning </button></div>
                </td>
              </tr>
            </tfoot>
            </table>  --> */