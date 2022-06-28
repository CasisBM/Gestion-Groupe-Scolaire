<?php
function loadCss(){
    $files = glob('./assets/css/*.css');
    $results ="";
    foreach ($files as $key => $value) {
        # code...    
        $results .= '<link rel="stylesheet" href="'.$value.'"media="screen" type="text/css" />';
    }

    echo $results;
}

?>