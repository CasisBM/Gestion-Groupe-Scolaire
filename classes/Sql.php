<?php class Sql
{
   private string $serverName = "localhost";
   private string $userName = "root";
   private string $userPassword = "";
   private string $database = "dbetablissement";
   private object $connexion;

   public function __construct()
   {
       try {
        $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->userPassword);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
       }
   }
   public function inserer($query){
      
       $this->connexion->exec($query);
       
   }
   public function getSelect($querysql){
        return $this->connexion->query($querysql)->fetchAll();
   }

    public function __destruct()
    {
        $this->connexion = null;
    }

}
