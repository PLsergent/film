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
    <TITLE>FILM DISPONIBLE</TITLE>
    <link rel="stylesheet" type="text/css" href="hello.css" />
  </HEAD>
<BODY>
  <?php
  try
  {
  	$bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
  }
  catch(PDOException $e)
  {
  	die(ERREUR_CONNECT_BDD.' : '.$e->getMessage());
  }
?>
<form method="post" action="index.php">

  <label for="pays">Quels films souhaitez-vous afficher ?</label><br/>
   <input type="submit" value="Valider"/>
   <select name="genre" id="genre">
   <option value="current"><?php echo $_POST['genre']; ?></option>
   <option value ="Tous les films">Tous les films</option>

	<?php

$reponse = $bdd->query('SELECT * FROM GENRE');

while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['libelle']; ?>"> <?php echo $donnees['libelle']; ?></option>
<?php
}
?>
</select>
</br>
</br>
<?php

$genre = $_POST['genre'];
$displayall = $bdd->query('SELECT titre FROM FILM');
$getid = $bdd->query("SELECT ID FROM GENRE where libelle='$genre'");
$id = $getid->fetch();
$id = $id['ID'];
$display = $bdd->query("SELECT titre FROM FILM
                        where Genid='$id'");

if (isset($_POST['genre'])) {
  if ($genre == 'Tous les films') {
    while ($aff = $displayall->fetch()) {
      echo $aff['titre'];
      ?>
    </br>
    <?php
    }
  }else{
    while ($aff = $display->fetch()) {
      echo $aff['titre'];
      ?>
    </br>
    <?php
    }
  }
}


?>
</br>

</BODY>
</HTML>


<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
