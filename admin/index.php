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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
	<body>

		<header class="header sticky-top">
    	<nav class="navbar navbar-expand-lg  bg-white py-3 shadow-sm">
        <div class="container">
            <img src="../img/pionir-logo.png"class="navbar-brand" alt="">
            <span class="vase_misli">Dobrodošli, <span id="korisnik"><?php echo $korisnik['ime']; ?> </span> </span>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right">
                    <a href="index.php"><button class="btn btn-primary">Meni</button></a>
                   <a href="logout.php"><button class="btn btn-danger">Odjava</button></a>
                </ul>
            </div>
        	</div>
    	</nav>
		</header>
	
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