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

$genres = array();
$films = array();

$gDAO = new genreDAO();
$i = 1;
$genre = $gDAO->fromId($i);
while($genre != null) {
    $genres[] = $genre;
    $i = $i + 1;
    $genre = $gDAO->fromId($i);
}

$fDAO = new filmDAO();
if(isset($_POST['genre']) and $_POST['genre'] != 'Tous les films') {
    $genre_choisi = htmlspecialchars($_POST['genre']);
    $i = 0;
    do {
        $i = $i + 1;
        $genre = $gDAO->fromId($i);
    } while(($genre != null) and ($genre->getLibelle() != $genre_choisi));

    $j = 1;
    $film = $fDAO->fromId($j);
    while($film != null) {
        if($film->getGenId() == $i) {
            $films[] = $film;
        }
        $j = $j + 1;
        $film = $fDAO->fromId($j);
    }
} else {
    $i = 1;
    $film = $fDAO->fromId($i);
    while($film != null) {
        $films[] = $film;
        $i = $i + 1;
        $film = $fDAO->fromId($i);
    }
}

require_once(PATH_VIEWS.'index.php');
?>
