
<?php
$files = glob('./functions/*.php');
foreach ($files as $key => $value) {
    # code...    
    if ($value !== "./functions/loadFunction.php")
        include $value;
}

?>