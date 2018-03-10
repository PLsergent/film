<?php
require_once(PATH_MODELS.'GenreDAO.php');
require_once(PATH_MODELS.'FilmDAO.php');

$gDAO = new genreDAO();
$fDAO = new filmDAO();
$film_choisi = isset($_GET['id']) ? $_GET['id'] : 1;

$film = $fDAO->fromId($film_choisi);
$genre_libelle = $gDAO->fromId($film->getId());

require_once(PATH_VIEWS.'details.php');
?>
