<?php 
if(!empty($_GET['etablissement']))
{
   $_SESSION['etablissement'] = $_GET['etablissement'];
}
else if(isset($_GET['etablissement']))
{
  unset($_SESSION['etablissement']);
}

include './includes/tbChoixEtablissement.php';
?>