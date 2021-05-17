<?php


trait Modele {
  private $pdo = null;
  public function __construct() {
    try {
      $HOST = "3.15.45.226:3306";
      $DATABASE_NAME = "dbmentorat";
      $USERNAME = "phpmentorat";
      $PASSWORD = "RoroIsHere@3326";
      $this->pdo = new PDO("mysql:host=$HOST; dbname=$DATABASE_NAME", $USERNAME, $PASSWORD);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
      exit("Erreur : " . $err->getMessage());
    }
  }
}