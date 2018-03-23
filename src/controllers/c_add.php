<?php
require_once (PATH_MODELS . 'FilmDAO.php');
require_once (PATH_MODELS . 'GenreDAO.php');

$genDAO = new GenreDAO(DEBUG);
$genres = $genDAO->getAll();

if (!empty($_POST)){
  if ($_POST['titre'] == '')  {$erreur = 'Veuillez rentrer un titre.';}
  if ($_POST['resume'] == '') {$erreur = 'Veuillez rentrer un résumé.';}
  if ($_POST['genre'] == '')  {$erreur = 'Veuillez séléctionner un genre.';}
  if (!empty($_FILES['image']['name'])) {
    if ($_FILES['image']['size'] > 100 * 1000) {
      $erreur = "L'image choisi ne doit pas dépasser 100Ko.";
    }
    if (!in_array($_FILES['image']['type'], array('image/jpeg', 'image/png', 'image/gif'))) {
      $erreur = "L'image choisi doit être des types suivants: jpeg, png ou gif.";
    }
  } else { 
    $erreur = 'Veuillez séléctionner une image.';
  }
  if (!isset($erreur)) {
    $titre = htmlspecialchars($_POST['titre']);
    $resume = htmlspecialchars($_POST['resume']);
    $genId = $_POST['genre'];
    $path = PATH_IMAGES . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    
    $FilmDAO = new FilmDAO(DEBUG);
    $FilmDAO->insert($titre, $resume, $genId, $_FILES['image']['name']);
    header('Location: index.php');
  } else {
    $alert = array('messageAlert'=>$erreur, 'classAlert'=>'danger');
  }
}

// appel de la vue
require_once (PATH_VIEWS . $page . '.php');
