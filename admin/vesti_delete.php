<?php
include_once('include_fns.php');
  
  $con = db_connect();

  $vest = $_REQUEST['vest'];
  
  if(!$_SESSION['auth_user'])
      echo "Niste prijavljeni";
  else
  {
    $query = "delete from vesti where id = $vest";
    $result = mysqli_query($con, $query);
	echo "probaj 4";
  }
  header('Location: '.$_SERVER['HTTP_REFERER']);
?> 