<?php
  // story_submit.php
  // add / modify story record

  include_once('include_fns.php');

  $handle = db_connect();
  mysqli_set_charset ( $handle , 'utf8');

  $datum      = $_REQUEST['datum'];
  $kategorija = $_REQUEST['kategorija'];
  $naslov     = $_REQUEST['naslov'];
  $tekst      = $_REQUEST['tekst'];
  $slika      = $_REQUEST['slika'];
  $uneo       = $_REQUEST['autor'];
  $redosled   = $_REQUEST['redosled'];
  $tekst      = addslashes($tekst);
  
  
if(isset($_POST['prikaz']) &&
   $_POST['prikaz'] == 'Yes')
{
    $prikaz = 1;
}
else
{
    $prikaz = 0;
}


  if (isset($_REQUEST['vest']) && $_REQUEST['vest']!='') 
  {   // It's an update
    $vest = $_REQUEST['vest'];
	
    $query = "update vesti
              set 
					datum        = '$datum',
					kategorija   = '$kategorija',
					naslov       = '$naslov', 
					tekst        = '$tekst',
					slika        = '$slika',
					uneo         = '$uneo',
					prikaz       = $prikaz,
					redosled     = $redosled,
					datum_izmene =  now()
              where id = $vest";
  }
  else 
  {         // It's a new story
  echo "datum pre inserta u bazu".$datum.'<br>';
    $query = "insert into vesti 
                (datum, kategorija, naslov, tekst, slika, uneo, prikaz, redosled)
              values 
                ('$datum', '$kategorija', '$naslov', '$tekst', '$slika', '$uneo', $prikaz, $redosled)";
  }

  $result = $handle->query($query);

  if (!$result) 
  {
    echo "Greška u bazi prilikom izvršenja upita <pre>$query</pre>";
    echo mysqli_error();
    exit;
  }
  else echo "Uspešno"
?>
