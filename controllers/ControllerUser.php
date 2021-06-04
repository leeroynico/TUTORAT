<?php

require_once('./models/User.php');
 $errors = [];
class ControllerUser
{

  public function addUser($email, $password, $confirmPassword)
  {
    $email = htmlspecialchars(trim($email));
    $password = htmlspecialchars(trim($password));
    $confirmPassword = htmlspecialchars(trim($confirmPassword));

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { // permet de filtre que les mail selon la norme 
      $errors['emailValidate'] = 'Votre adresse Email n\'est pas valide';
      echo 'Votre adresse Email n\'est pas valide';
    }

    if ($password !== $confirmPassword) {
      $errors['password'] = 'Vos mots de passes ne sont pas identiques';
      echo 'Vos mots de passes ne sont pas identiques';
    }

    if (strlen($password) < 8) {
      $errors['passwordLength'] = 'Votre mot de passe trop court, 8 caractères minimum';
      echo 'Votre mot de passe trop court, 8 caractères minimum';

    }

    
    if (!empty($errors)) {
      
      $_SESSION['errors'] = $errors;
      $_SESSION['inputs'] = $_POST; // permet de garder les inputs saisie sauvgarder en cas d'erreur
     // var_dump($errors);

    } else {
      $passwordHash = password_hash(trim($password), PASSWORD_DEFAULT);

      $user = new User();
      $response = $user->verifExistedUser($email);

      if (count($response) == 0 || !isset($response)) {  // si la réponse est null donc aucun user n'existe 
        $user->addUser($email, $passwordHash);
        $_SESSION['flash']['success'] = 'Vous êtes bien inscrit';
      } else {
        $_SESSION['flash']['alert'] = 'Votre adresse email est déja utilisé par un autre utilisateur.';

      }
    }
  }
}
