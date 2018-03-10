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
<form method="post" action="index.php">
<label for="film">Quels films souhaitez-vous afficher ?</label></br>
 <input type="submit" value="Valider"/>
 <select name="genre" id="genre">
 <option value="Choisissez un genre"><?= $genre_choisi_libelle ?></option>
   <option value ="Tous les films">Tous les films</option>

    <?php
    foreach($genres as $genre) {
    ?>
      <option value="<?= $genre->getId() ?>">
        <?= $genre->getLibelle() ?>
      </option>
    <?php
    }
    ?>
  </select>
</form>
</br>
</br>

<?php
if ($films) {
  foreach($films as $film) {
?>
    <a href='index.php?page=details&id=<?= $film->getId() ?>'/>
    <?= $film->getTitre() ?>
    </br>
    <img src="<?= PATH_IMAGES.$film->getNomFichier() ?>" height="240px"
                                                       width="180px"/>
    </a>
    </br></br>
<?php
  }
} else {
  if ($genre_choisi_libelle) {
    echo "Pas de films du genre: ".$genre_choisi_libelle;
  } else {
    echo "Pas de films dans la base de données.";
  }
}
?>
</br>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
