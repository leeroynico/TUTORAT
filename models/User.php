<?php

require_once('Modele.php'); // import du Modele connect PDO

class User {
  use Modele;

  public function verifExistedUser($email) { 
    if(!is_null($this->pdo)) {
      $stmt = $this->pdo->prepare('SELECT email FROM user WHERE email= ?');
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
      $stmt = $this->pdo->prepare('INSERT INTO user ( email, password) VALUES (:email, :password)');
      $stmt->execute([
        ':email' => $email,
        ':password' => $password
      ]);
      return true;
    }
    return false;
  }

  public function removeUserbyUser($id, $password) {
    if(!is_null($this->pdo)) {
      $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id AND password = :password');
      $stmt->execute([
        ':id' => $id,
        ':password' => $password
      ]);
      return true;
    }
    return false;
  }
}