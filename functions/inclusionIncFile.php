
<?php
function inclusionIncFile($defaultPage){
    $files = glob('./includes/*.php');
    $filesAdmin = glob('./includes/admin/*.inc.php');
    $page = $_GET['page'] ?? $defaultPage;
    $pageTest = './includes/' . $page . '.php';
    $pageTestAdmin = './includes/admin/'. $page . '.inc.php';

    //var_dump($page);


    if (in_array($pageTest,$files))
    {
        require "./includes/$page.php";
    }
    else if(in_array($pageTestAdmin,$filesAdmin))
    {      
        require "./includes/admin/$page.inc.php";
    }
    else if(file_exists("./includes/$defaultPage.inc.php"))
    {
        require "./includes/$defaultPage.inc.php";
    }
    else 
    {
        require "./includes/admin/$defaultPage.inc.php";
    } 
}

    ?>