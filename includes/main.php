
<main>

<?php
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
            $admin = new Admin();
            $admin->verifUtilisateur($_GET['email'],$_GET['token']);
            //$login->redirect(BASE_URL.'verification?verified');
            exit();
    }
    //dump(dateDifference());
    inclusionIncFile('ajouterProf');
    ?>

</main>

