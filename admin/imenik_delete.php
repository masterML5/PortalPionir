<?php
include_once('include_fns.php');
  
  $con = db_connect();

  $imenik = $_REQUEST['imenik'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    $query = "delete from imenik where id = $imenik";
    $result = mysqli_query($con, $query);
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 