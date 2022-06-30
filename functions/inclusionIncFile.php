
<?php
function inclusionIncFile($defaultPage){
    $files = glob('./includes/*.inc.php');
    $filesAdmin = glob('./includes/admin/*.php');
    $page = $_GET['page'] ?? $defaultPage;
    $pageTest = './includes/' . $page . '.php';
    $pageTest1 = './includes/' . $page . '.inc.php';
    $pageTestAdmin = './includes/admin/'. $page . '.inc.php';
   
 //  var_dump($page);
    
     if (in_array($pageTest,$files))
    {
        require "./includes/$page.inc.php";
    }
    else if (in_array($pageTest1,$files)) {
        require "./includes/$page.inc.php";
    }
    else if(in_array($pageTestAdmin,$filesAdmin))
    {      
        require "./includes/admin/$page.inc.php";
    }
    else if(file_exists("./includes/$defaultPage.inc.php"))
    {
        echo "13";
        require "./includes/$defaultPage.inc.php";
    }
    else 
    {
        echo "14";
        require "./includes/admin/$defaultPage.inc.php";
    } 
 
    

}

    ?>