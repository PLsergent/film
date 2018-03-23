<?php

if (!isset($_SESSION['logged'])){
  $_SESSION['logged'] = false;
}

if($_SESSION['logged'] == true){
  $_SESSION['logged'] = false;
}

if (isset($_SESSION['logged'])){
  if($_POST['logged'] == false){
    $pass = password_hash(PWD, PASSWORD_DEFAULT);
    if (($_POST['pseudo']==USER)&&(password_verify($_POST['pass'],$pass))){

      $_SESSION['logged'] = true;

    }else{
      if (($_POST['pseudo']!="") || ($_POST['pass']!="")){
        $erreur = "Mot de passe ou pseudo incorrect.";
        $_SESSION['logged'] = false;
      }else{
        $_SESSION['logged'] = false;
      }
    }
  }
}

if(!isset($erreur) && $_SESSION['logged'] == true) {
  $alert = array('messageAlert'=>'Connecté', 'classAlert'=>'success');
}else{
  if (($_POST['pseudo']!="") || ($_POST['pass']!="")){
    $alert = array('messageAlert'=>$erreur, 'classAlert'=>'danger');
  }
}

require_once (PATH_VIEWS . $page . '.php');
?>
