<?php
spl_autoload_register(function($className){
  
   require '../../classes/'.$className.'.php';

});
$sqlQuery = new Sql();
$tblQuery = array();

$tblQuery = $sqlQuery->getSelect("select * from salles");

?>
 <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="../../assets/js/include.js" defer></script>
    <link rel="stylesheet" href="../../assets/css/normalize.css" />
    <link rel="stylesheet" href="../../assets/css/table.css" />
    
  </head>
  <body>
    <div w3-include-html="../header.php"></div>
            <!--/Table Liste Professeur-->
            <table>
              <thead>
                <tr>
                  <th id="nomTable" colspan="5">Liste des salles</th>
                </tr>
                <tr>
                  <th colspan="5">
                    <div class="container">
                      <div class="search-box">
                         <input type="text" class="search-input" placeholder="Recherche..">
                         <i class="fas fa-search search-button"></i>
                      </div>
                  </th>
                </tr>
                
               </div>
              <tr id="titreTable">
                <th>Salles</th>
                <th>Caracteristique</th>
                <th>Voir planning</th>
                <th>Ecoles</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i <count($tblQuery) ; $i++) { ?>
                
                <td><?=$tblQuery[$i]['nom_salle'] ?></td>
                <td><?=$tblQuery[$i]['caracteristique'] ?></td>
                <td>
                <a href="planningesalle.html">
                <i class="fa-solid fa-calendar-days fa-2x"></i>
                </a>
                </td>
                <td>Ecole 1</td>
                <td>
                <i class="fa-solid fa-pen"></i>
                <i class="fa-solid fa-trash"></i>
                </td>
                </tr>
             <?php } ?>
      
       
            </tbody>
            <tfoot>
              <tr >
                <td  colspan="5">
                  <div id="footTable">
                    <div
                    data-pagination=""
                    data-num-pages="numPages()"
                    data-current-page="currentPage"
                    data-max-size="maxSize"
                    data-boundary-links="true"
                  > </div>
                  <button id="buttonTable" type="button"> Ajouter une salle </button></div>
                </td>
              </tr>
            </tfoot>
            </table> 
  </body>
</html>
