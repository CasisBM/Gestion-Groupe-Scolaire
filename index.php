<?php
spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

date_default_timezone_set('Europe/Paris');

include './functions/loadFunction.php'; 
require_once './includes/head.php';
include './includes/frmLogin.php';
require_once './includes/footer.php';
?>