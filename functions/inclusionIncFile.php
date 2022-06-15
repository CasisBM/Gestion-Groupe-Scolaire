
<?php
function inclusionIncFile($defaultPage){
    $files = glob('./includes/*.inc.php');
    $page = $_GET['page'] ?? $defaultPage;
    $pageTest = './includes/' . $page . '.inc.php';
    if (in_array($pageTest,$files)) 
        require "./includes/$page.inc.php";
    
    else
    require "./includes/$defaultPage.inc.php";

}

    ?>