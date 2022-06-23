<?php 

class Utilisateur implements interfaceUtilisateur
{
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $password;
    private Sql $db;

    public function __construct( string $mail, string $password, string $nom = "", string $prenom = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
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

    public function inscrireUtilisateur()
    {
        if(empty($this->nom) || empty($this->prenom))
        {
            return "Il manque le nom ou le prénom";
        }

        
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        $requete = "INSERT INTO utilisateurs (nom,prenom,mail,password) VALUES ('$this->nom','$this->prenom','$this->mail','$passwordHash' );";
        $this->db->editTable($requete);

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
        $resultatLogin = $this->db->showTable($requeteLogin);

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

