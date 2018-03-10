<?php
/*
 * DS PHP
 * Controller page accueil
 *
 * Copyright 2017, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

require_once(PATH_MODELS.'GenreDAO.php');
require_once(PATH_MODELS.'FilmDAO.php');

$gDAO = new genreDAO();
$genres = $gDAO->all();

$fDAO = new filmDAO();
if (isset($_POST['genre'])) {
  $genre_choisi = $_POST['genre'];
  if($genre_choisi != "Tous les films") {
    $films = array();
    $genre_choisi_libelle = ($gDAO->fromId((int)$genre_choisi))->getLibelle();

    $i = 1;
    $film = $fDAO->fromId($i);
    while($film != null) {
      if ($film->getGenId() == $genre_choisi) {
        $films[] = $film;
      }
      $i = $i + 1;
      $film = $fDAO->fromId($i);
    }
  } else {
    $genre_choisi_libelle = $genre_choisi;
    $films = $fDAO->all();
  }
} else {
  $films = $fDAO->all();
}


require_once(PATH_VIEWS.'index.php');
?>
