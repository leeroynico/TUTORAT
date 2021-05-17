<?php




trait Modele {
  private $pdo = null;
  public function __construct() {
    try {
      require_once('./models/config.php');
      $this->pdo = new PDO("mysql:host=$HOST; dbname=$DATABASE_NAME", $USERNAME, $PASSWORD);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
      exit("Erreur : " . $err->getMessage());
    }
  }
}