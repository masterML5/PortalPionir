<?php
include_once('include_fns.php');

  if ( (!isset($_REQUEST['username'])) || (!isset($_REQUEST['password'])) ) 
  {
    echo 'Morate uneti korisni�ko ime i lozinku za nastavak';
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
    echo 'Neispravna lozinka';
    exit;
  }
?>
