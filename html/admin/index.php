<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Alfa-Plam a.d. Vranje - Portal</TITLE>

<link href="css/style_v2_optimized.css" rel="stylesheet" type="text/css">

<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>



<?php
   
  include_once('include_fns.php');

  if (!check_auth_user()) 
  {
	echo '<h2> <br><br> </h2>';
  login_form();
  }
  else 
  {
		$handle = db_connect();
		mysqli_set_charset ( $handle , 'utf8');
		
		$korisnik = get_korisnik_record($_SESSION['auth_user']);

		echo '<img class="background-image" src="img/login-whisp.png">';
		echo '<p>Dobrodošli, '.$korisnik['ime'];
		echo ' (<a href="logout.php">Odjava</a>) (<a href="index.php">Meni</a>) </p>';
		echo '<p>';
		echo '<ul>';		
		echo '<li><a href="vesti_lista.php">Vesti</a></li>';
		echo '<li><a href="dokumenti_lista.php">Dokumenti</a></li>';
		echo '<li><a href="imenik_lista.php">Imenik</a></li>';		
		echo '<li><a href="misli_lista.php">Misli</a></li>';		
		echo '</ul>';		
		echo '<p>';
  }
?>
