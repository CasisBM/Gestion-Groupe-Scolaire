<?php

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
    $userID = intval($_GET['true']);
    try {
        $stmt = $login->runQuery("UPDATE users SET email_verify='1' WHERE email=:email AND token=:token");
        $stmt->execute(array(":userID"=>$userID));  
        $login->redirect(BASE_URL.'verification?verified');
        exit();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>