<?php

session_name('pl');
session_start();

$_SESSION['logged'] = false;

if (($_POST['pseudo']==USER)&&($_POST['pass']==PSWD)){

  $_SESSION['logged'] = true;

}

require_once(PATH_VIEWS.'login.php');
?>
