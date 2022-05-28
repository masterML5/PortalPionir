<?php
include_once('include_fns.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Alfa-Plam a.d. Vranje - Portal</title>

<link href="css/stylemenu.css" rel="stylesheet" type="text/css">

<meta name="GENERATOR" content="MSHTML 9.00.8112.16443">
</head>



<?php
   


  if (!check_auth_user()) 
  {
	
  login_form();
  }
  else 
  {
		$handle = db_connect();
		mysqli_set_charset ( $handle , 'utf8');
		
		$korisnik = get_korisnik_record($_SESSION['auth_user']);
		

	?>
	<body>
		<div class="navbar">
		<span>Dobrodošli, <span id="korisnik"><?php echo $korisnik['ime']; ?></span></span>
		 <a href="logout.php">Odjava</a> 
		 <a href="index.php">Meni</a>
		 
		 
		</div>
	
	
		<div class="navmenubar">
		<nav>
  		<ul>
		  <a href="vesti_lista.php"><li><span>Vesti</span></li></a>
		  <a href="dokumenti_lista.php"><li><span>Dokumenti</span></li></a>
		  <a href="imenik_lista.php"><li><span>Imenik</span></li></a>
		  <a href="misli_lista.php"><li><span>Misli</span></li></a>
  		</ul>
		</nav>
		</div>
		</body>
			<?php
  }
?>
</html>