<?php
  
  include_once('include_fns.php');
  
  $handle = db_connect();

  $imenik = $_REQUEST['imenik'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    $query = "delete from imenik where id = $imenik";
    $result = $handle->query($query);
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 