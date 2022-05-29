<?php
include_once('include_fns.php');

  $handle = db_connect();
  mysqli_set_charset ( $handle , 'utf8');
  
  $naslov = $_REQUEST['naslov'];
  $autor = $_REQUEST['autor'];
  $tekst = $_REQUEST['tekst'];
  $tekst = addslashes($tekst);
  
  
if(isset($_POST['prikaz']) &&
   $_POST['prikaz'] == 'Yes')
{
    $prikaz = 1;
}
else
{
    $prikaz = 0;
}
  

  if (isset($_REQUEST['misao']) && $_REQUEST['misao']!='') 
  {   // It's an update
    $misao = $_REQUEST['misao'];

    $query = "update misli
              set naslov = '$naslov', 
                  autor = '$autor',
				  tekst = '$tekst',
				  prikaz = $prikaz,
                  datum_unosa =  now()
              where id = $misao";
  }
  else 
  {         // It's a new story
    $query = "insert into misli 
                (naslov, tekst, autor, korisnik, prikaz, datum_unosa)
              values 
                ('$naslov', '$tekst', '$autor', '".
               $_SESSION['auth_user']."', prikaz, now())";
  }

  $result = $handle->query($query);

  if (!$result) 
  {
    
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, misao nije upload-ovana." . '</div>';
    exit;
  }
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novu misao!" . '</div>';
?>
