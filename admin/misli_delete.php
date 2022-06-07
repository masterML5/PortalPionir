<?php
include_once('include_fns.php');
  
  $con = db_connect();

  $misao = $_REQUEST['misao'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    
    $query = "delete from misli where id = $misao";
    $result = mysqli_query($con, $query);
	echo "probaj 4";
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 