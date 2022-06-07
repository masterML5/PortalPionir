<?php
include_once('include_fns.php');

  $con = db_connect();
  mysqli_set_charset ( $con , 'utf8');
  
  $sifrad      = $_REQUEST['sifrad'];
  $prezime     = $_REQUEST['prezime'];
  $ime         = $_REQUEST['ime'];
  $sifoj       = $_REQUEST['sifoj'];
  $nazoj       = $_REQUEST['nazoj'];
  $email	   = $_REQUEST['email'];
  $tel_mobilni = $_REQUEST['tel_mobilni'];
  $tel_fiksni  = $_REQUEST['tel_fiksni'];
  $tel_lokal   = $_REQUEST['tel_lokal'];
  $lice_sluzba = $_REQUEST['lice_sluzba'];
  $firma_naziv = $_REQUEST['firma_naziv'];  

  //$tekst = addslashes($tekst);
  

  if (isset($_REQUEST['imenik']) && $_REQUEST['imenik']!='') 
  {   // It's an update
    $imenik = $_REQUEST['imenik'];

    $query = "update imenik
              set sifrad        = '$sifrad', 
                  prezime       = '$prezime',
				  ime           = '$ime',
				  sifoj         = '$sifoj',
				  nazoj         = '$nazoj',
				  email			= '$email', 
				  tel_mobilni   = '$tel_mobilni',
				  tel_fiksni    = '$tel_fiksni',
				  tel_lokal     = '$tel_lokal',
				  lice_sluzba   = '$lice_sluzba',
				  firma_naziv   = '$firma_naziv',				  
                  datum_izmene  =  now()
              where id = $imenik";
    $b = 1;
  }
  else 
  {         // It's a new story
    $query = "insert into imenik 
                (sifrad, prezime, ime, sifoj, nazoj, email, tel_mobilni, tel_fiksni, tel_lokal, lice_sluzba, firma_naziv, uneo, datum_unosa)
              values 
				('$sifrad', '$prezime', '$ime', '$sifoj', '$nazoj', '$email', '$tel_mobilni', '$tel_fiksni', '$tel_lokal', '$lice_sluzba', '$firma_naziv', '".
               $_SESSION['auth_user']."', now())";
    $b = 2;
  }

  $result = mysqli_query($con, $query);


  if (!$result) 
  {
    if($b == 1)
    {
      $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, kontakt nije update-ovan." . '</div>';
    header("Location: imenik_change.php?imenik=".$imenik);
    }
    else if($b == 2)
    {
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, kontakt nije upload-ovan." . '</div>';
    header("Location: imenik_add.php");
    }
    exit;
  }
  if($b == 1)
  {
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili kontakt!" . '</div>';
  header("Location: imenik_change.php?imenik=".$imenik);
  } 
  else if($b == 2)
  {
    $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novi kontakt!" . '</div>';
    header("Location: imenik_add.php");
  }

?>
