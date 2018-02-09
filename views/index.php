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
<h1><?php  echo TITRE_PAGE_ACCUEIL;?></h1>

<!--  Formulaire -->

<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset ="utf-8"/>
    <TITLE><?= TITRE ?></TITLE>
    <link rel="stylesheet" type="text/css" href="hello.css" />
  </HEAD>
<BODY>
	<select>
		<option value="Science Fiction">Science Fiction</option>
		<option value="Science Fiction">Science Fiction</option>
		<option value="Science Fiction">Science Fiction</option>
	</select>
(1, 'Science Fiction'),
(2, 'Americana'),
(3, 'Art vidéo'),
(4, 'Buddy movie'),
(5, 'Chanbara'),
(6, 'Chronique'),
(7, 'Cinéma amateur'),
(8, 'Cinéma d\'auteur'),
(9, 'Cinéma de montagne'),
(10, 'Cinéma expérimental'),
(11, 'Comédie'),
(12, 'Documentaire'),
(13, 'Cinéma surréaliste '),
(14, 'Drame'),
(15, 'Film à sketches'),
(16, 'Film à suspense'),
(17, 'Film d\'action'),
(18, 'Film d\'aventure'),
(19, 'Film catastrophe'),
(20, 'Film érotique'),
(21, 'Film d\'espionnage'),
(22, 'Film d\'exploitation'),
(23, 'Film fantastique'),
(24, 'Film de guerre'),
(25, 'Film de guérilla'),
(26, 'Film historique'),
(27, 'Film institutionnel'),
(28, 'Film d\'horreur'),
(29, 'Film de super-héros'),
(30, 'Film musical'),
(31, 'Film policier'),
(32, 'Film d\'opéra'),
(33, 'Film pornographique'),
(34, 'Teen movie'),
(35, 'Ken Geki'),
(36, 'Masala'),
(37, 'Road movie'),
(38, 'Film d\'amour'),
(39, 'Péplum'),
(41, 'Sérial'),
(42, 'Thriller'),
(43, 'Troma'),
(44, 'Western');
	<?php
		
	if (isset($nom)) 
	{
		if(isset($erreur)) // affichage des erreurs de login
		{
		  echo '  <p class="erreur">'.$nom.' : '.$erreur.'</p>';
		}
		else
		{
			echo '<ul>';
			// sinon affichage de la boucle de messages
			for($i=0;$i<=$resultats['nbRepet']; $i++)
			{
				echo '<li>'.$resultats['mot'].' '.$nom.'</li>';
			}
			echo '</ul>';
		}
	}
	?>
</BODY>
</HTML>


<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
