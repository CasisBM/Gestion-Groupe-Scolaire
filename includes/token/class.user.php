
<?php
//Registration Function

        function register($firstName, $lastName, $email, $password, $referral, $country, $phone){
        try {
            $token = bin2hex(random_bytes(50)); // generate unique token
            $new_password = password_hash($password, PASSWORD_DEFAULT);     
            $stmt = $this->connect->prepare("INSERT INTO users(email, password, first_name, last_name, referral, country, token, status, signup_date, last_login, last_updated, email_verify, phone) 

            VALUES(:email, :password, :firstName, :lastName, :referral, :country, :token, 'Active', now(), now(), now(), '0', :phone)");

            $stmt->bindparam(":firstName", $firstName);
            $stmt->bindparam(":lastName", $lastName);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $new_password);
            $stmt->bindparam(":referral", $referral);
            $stmt->bindparam(":country", $country); 
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":token", $token);
            $stmt->execute();
            $loginID = $this->connect->lastInsertId();

            //include welcome Email File
            $results = $this->connect->prepare("SELECT * FROM website_settings 
                WHERE id='1'");
            $results->execute();
            $siteInfo = $results->fetch(PDO::FETCH_ASSOC);

            include(ROOT_PATH."emailTemplates/welcomeMsg.php");

            return $stmt;   
        }
        catch(PDOException $e)  {
            echo $e->getMessage();
        }  
        
        //Grab email and token from the verification link and checks if exist in the system
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
        }
    }

    /*public function sendEmail($email, $token){
        try {
            $stmt = $this->connect->prepare("SELECT login_id, email, token FROM users 
                WHERE email=:email AND email_verify='0'");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(":token", $token);
            $stmt->execute(array(':email'=>$userID));

            include(ROOT_PATH."emailTemplates/email_verify.php");

            return $stmt;
        }
        catch(PDOException $e)  {
            echo $e->getMessage();
        }
    }*/