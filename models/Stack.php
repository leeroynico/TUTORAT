<?php
require_once('Modele.php'); // import du Modele connect PDO

class Stack {
  use Modele;


  public function gettechnolist() { 
    if(!is_null($this->pdo)) {
      $stmt = $this->pdo->prepare('SELECT * FROM techno');
      $stmt->execute();

      $technolist=[];
      while($techno=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $technolist[] = $techno;
      }
      return $technolist;
    }
    return null;
  }
}