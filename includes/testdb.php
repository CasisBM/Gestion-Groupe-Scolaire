<?php
spl_autoload_register(function($className){
    require '../classes/'.$className.'.php';
});

$sqlQuery = new Sql();

$tblQuery = array();

$tblQuery = $sqlQuery->getSelect("select * from utilisateur");

if (count($tblQuery)){
    
      $messagetb = "<table>";
      $messagetb .= "<tr>";
      $messagetb .= "<th>";
      $messagetb .= "NOM";
      $messagetb .= "</th>";
      $messagetb .= "</tr>";
  
      for ($i=0; $i <count($tblQuery) ; $i++) { 
          
          $messagetb .= "<tr>";
          $messagetb .= "<td>";
          $messagetb .=$tblQuery[$i]['identifiant'];
          $messagetb .="</td>";
          $messagetb .="</tr>";
      }
      
      $messagetb .= "</table>";
      //var_dump($messagetb);
      //echo "Finaly!!!!!!!!!!!!!";
      echo $messagetb;
  }
  else
   echo "Il n'y a pas de contenus dans tableau utilisateur !";



?>