<?php
/*
 * MODULE DE PHP
 * Index du site
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once(PATH_TEXTES.LANG.'.php');

//vérification de la page demandée

if(isset($_GET['page']) && is_file(PATH_CONTROLLERS.$_GET['page'].".php"))
    $page = $_GET['page']; // http://.../index.php?page=toto
elseif(!isset($_GET['page']))
    $page="index"; //page d'accueil du site - http://.../index.php
else
    $page="404"; //page demandée inexistante

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');

?>
