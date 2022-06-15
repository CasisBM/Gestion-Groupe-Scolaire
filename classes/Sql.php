<?php class Sql
{
    private $serverName = "localhost";
    private $userName = "root";
    private $userPassword = "";
    private $database = "filrouge";
    private $connexion;
    
    public function __construct(string $serverName,$userName,$userPassword,$database)
    {
        try {
            //code...
            $this->connexion = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erreur : ".$e->getMessage() );
        }  
    }

    public function inserer($requete)
    {
        $this->connexion->exec($requete);
    }

    public function __destruct()
    {
        $this->connexion = null;
    }

    
}