<?php
/*
 * DS PHP
 * Vue page index - page d'accueil
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
?>

<!--  En tête de page -->
<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php'); ?>

<!--  Début de la page -->
<h3>Connexion</h3>
<?php

if (isset($_SESSION['logged'])){
  if ($_SESSION['logged'] == false){ ?>
      <form method="post" action="">
        <p>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" />

            <br/>
            <label for="pass">Mot de passe :</label>
            <input type="password" name="pass" id="pass" />

            <br/>
            <input type="submit" value="Valider"/>
        </p>
      </form>
<?php }
}?>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
