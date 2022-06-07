<?php
include_once('include_fns.php');
  
  $con = db_connect();

  $dokument = $_REQUEST['dokument'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    $query = "delete from dokumenti where id = $dokument";
    $result = mysqli_query($con, $query);
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 