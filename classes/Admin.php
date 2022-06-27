<?php 

class Admin
{
    private Sql $db;

    public function __construct()
    {
        $this->db = new Sql();
    }

    public function __call($name, $arguments)
    {
        echo "La methode $name n'est pas accessible";
        echo "Les arguments passés sont  ".implode('/',$arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        
    }

    public function __get($name)
    {
        echo "La variable  $name n'existe pas";
    }

    public function __set($name, $value)
    {
        echo "Vous essayez de mettre la valeur $value a la variable  $name";
    }

    public function __toString()
    {
        return "Vous tentez d'afficher un objet";
    }

    public function __invoke($arguments)
    {
        echo "Vous tentez d'utiliser un objet comme fonction avec pour argumets $arguments";
    }

    public function __clone()
    {
        //invoqué lors du clonage d'objet

    }

    public function ajouterProf(string $identifiant, string $password, string $nom , string $prenom,string $mail)
    {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $requete = "INSERT INTO enseignants (identifiant,password,nom,prenom,email) VALUES ('$identifiant','$passwordHash','$nom','$prenom','$mail');";
        $this->db->inserer($requete);
        $requete = "SELECT id_enseignant FROM enseignants WHERE email = '$mail';";
        dump($requete);
        $id = $this->db->lister($requete)[0]['id_enseignant'];
        $date = date("Y-m-d H:i:s");
        $requete = "INSERT INTO comptes(creation_compte,envoi_mail,token,id_enseignant,email_verification) VALUES ('$date','$passwordHash','$nom','$prenom','$mail');";

        
        
        $token = bin2hex(random_bytes(50)); // generate unique token

    }

     public function modifierUtilisateur()
    {

    }
    public function supprimerUtilisateur()
    {

    }
    public function connecterUtilisateur():bool
    {

        $requeteLogin = "SELECT password FROM utilisateurs WHERE mail='$this->mail'";
        $resultatLogin = $this->db->lister($requeteLogin);

        if (count($resultatLogin) > 0) {
            // Traitement pour vérifier le mot de passe
            $resultatPassword = $resultatLogin[0]['password'];

            if (password_verify($this->password, $resultatPassword)) {
                $_SESSION['login'] = true;
                $messageEmail = $this->mail . ' vous êtes connecté !';
                sendMail($this->mail, 'contact@ceppic-php-file-rouge.fr', 'Login Success', $messageEmail);
                return true;
            } else {
                $_SESSION['login'] = false;
                return false;
            }
        }

        return false;
    }

    public function deconncterUtilisateur()
    {

    } 

}

