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

    }
  }
}
require_once (PATH_VIEWS . $page . '.php');
?>
