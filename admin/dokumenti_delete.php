<?php
include_once('include_fns.php');
  
  $handle = db_connect();

  $dokument = $_REQUEST['dokument'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    $query = "delete from dokumenti where id = $dokument";
    $result = $handle->query($query);
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 