<?php

require_once('Modele.php'); // import du Modele connect PDO

class User {
  use Modele;


  public function verifExistedUser($email) { 
    if(!is_null($this->pdo)) {
      $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email= ?');
      $stmt->execute(array($email));

      $userData=[];
      while($user=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $userData[] = $user;
      }
      return $userData;
    }
    return null;
  }

  public function addUser($email, $password) {
    if(!is_null($this->pdo)) {
      $stmt = $this->pdo->prepare('INSERT INTO users ( email, password) VALUES (:email, :password)');
      $stmt->execute([
        ':email' => $email,
        ':password' => $password
      ]);
      return true;
    }
    return false;
  }
}