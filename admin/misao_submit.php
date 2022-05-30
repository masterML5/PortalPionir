<?php
include_once('include_fns.php');
if(isset($_POST['btnSubmit'])){

  $handle = db_connect();
  mysqli_set_charset ( $handle , 'utf8');
  
  $misao = $_REQUEST['misao'];
  $naslov = $_REQUEST['naslov'];
  $autor = $_REQUEST['autor'];
  $tekst = $_REQUEST['tekst'];
  $tekst = addslashes($tekst);


}
if(isset($_POST['prikaz']) &&
   $_POST['prikaz'] == 'Yes')
   
{
    $prikaz = 1;
}
else
{
    $prikaz = 0;
}


  if (isset($_REQUEST['misao']) && $_REQUEST['misao']!='') {

    

    // It's an update
    $misao = $_REQUEST['misao'];
    

    $query = "update misli
              set naslov = '$naslov', 
                  autor = '$autor',
				  tekst = '$tekst',
				  prikaz = $prikaz,
                  datum_unosa =  now()
              where id = $misao";

    $b = 1;
  }
  
               
  else 
  {         // It's a new story
    $query = "insert into misli 
                (naslov, tekst, autor, korisnik, prikaz, datum_unosa)
              values 
                ('$naslov', '$tekst', '$autor', '".
               $_SESSION['auth_user']."', 'prikaz' , now())";
    $b = 2;
  }


  $result = $handle->query($query);

  if (!$result) 
  {
    if($b == 1)
    {$_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, misao nije update-ovana." . '</div>';}
    else if($b == 2)
    {
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, misao nije upload-ovana." . '</div>';
    }
    exit;
  }
  if($b == 1)
  {
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili misao!" . '</div>';
  } 
  else if($b == 2)
  {
    $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novu misao!" . '</div>';
  }

?>
