<?php

require_once('./config.php');

trait Modele {

  private $pdo = null;
  public function __construct() {
    try {
      $this->pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_DATABASE_NAME.'', DB_USERNAME, DB_PASSWORD);
    } catch (PDOException $err) {
      exit("Erreur : " . $err->getMessage());
    }
  }
}