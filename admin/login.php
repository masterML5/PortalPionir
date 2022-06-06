<?php
include_once('include_fns.php');

  if ( (!isset($_REQUEST['username'])) || (!isset($_REQUEST['password'])) ) 
  {

    $_SESSION['status'] = '<div class="alert alert-danger">' . "Morate uneti korisni�ko ime i lozinku za nastavak" . '</div>';
    header("Location: index.php");
    exit;
  }

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  if (login($username, $password)) 
  {
    $_SESSION['auth_user'] = $username;
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }
  else 
  {
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Ne ispravna lozinka ili korisničko ime!" . '</div>';
    header("Location: index.php");

    exit;
  }
?>
