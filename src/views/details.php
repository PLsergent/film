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
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<!--  Début de la page -->
<h1><?php  echo Détails film;?></h1>

<!--  Liste  -->
<h2><?php echo $film->getTitre();?><h2></br>
<img src="<?= PATH_IMAGES.$film->getNomFichier() ?>" height="400" width="auto"/></br></br>
<h2>Résumé</h2></br>
<?php echo $film->getResume();?></br></br>
<h2>Genre</h2></br>
<?php echo $genre_libelle->getLibelle();?></br>
<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
