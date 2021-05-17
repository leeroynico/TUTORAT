<?php
session_start();

require_once('./controllers/ControllerUser.php');

if ($_POST) {
  $_SESSION['value'] = [$_POST['email'], $_POST['password'], $_POST['confirmPassword'], $_POST['stack'], $_POST['roleMontor'], $_POST['rolePadawan']];
  $controllerUser = new ControllerUser();
  $controllerUser->addUser($_POST['email'], $_POST['password'], $_POST['confirmPassword']);
}
?>

<?php require('./views/header.php'); ?>

  <div class="container">
    <?php
    if (array_key_exists('errors', $_SESSION)) : ?>
      <div class="alert alert-danger">
        <p class="font-weight-bold">Vous n'avez pas remplie le formulaire correctement : </p>
        <?= implode('<br>', $_SESSION['errors']); ?>
      </div>
    <?php

    endif; ?>

    <form action="" method="post">

      <div class="form-group col-md-4">
        <label for="email">Email *</label>
        <input required type="email" class="form-control" id="email" name="email" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ""; ?> ">
      </div>

      <div class="form-group col-md-4">
        <label for="password">Mot de passe *</label>
        <input required type="password" class="form-control" id="password" name="password">
      </div>

      <div class="form-group col-md-4">
          <label for="confirmPassword">Confirmation mot de passe *</label>
          <input required type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>

      <div class="input-group col-md-4 mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="stack">languages</label>
        </div>
        <select multiple class="custom-select" id="stack" name="stack[]">
          <option value="HTML">HTML</option>
          <option value="CSS">CSS</option>
          <option value="JS">Javascript</option>
          <option value="PHP">PHP</option>
        </select>
      </div>

        <div class="col-md-4">
          <div class="form-check ">
            <input class="form-check-input"  type="checkbox" name="roleMontor" id="roleMontor" value="montor" checked>
            <label class="form-check-label" for="roleMontor">
              Tuteur
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="rolePadawan" id="rolePadawan" value="padawan">
            <label class="form-check-label" for="rolePadawan">
              Apprenant
            </label>
          </div>
        </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>

    </form>

  </div>

  <h2>DEBUG :</h2>
    <?php
    var_dump($_SESSION); 
    ?>

<?php unset($_SESSION['errors']); // permet d effacer les erreurs de l'affichage mais ça ne me les affiche plus  ?>

<?php require('views/footer.php'); ?>