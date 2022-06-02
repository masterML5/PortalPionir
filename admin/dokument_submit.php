<?php
include_once('include_fns.php');

  $handle = db_connect();
  mysqli_set_charset ( $handle , 'utf8');

  $datum    = $_REQUEST['datum'];
  $kategorija = $_REQUEST['kategorija'];
  $naslov     = $_REQUEST['naslov'];
  $tekst      = $_REQUEST['tekst'];
  $uneo       = $_REQUEST['autor'];
  $tekst      = addslashes($tekst);
  $b = 0;
  $target_dir = "../dokumenti/images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($target_file == $target_dir){
    $target_file = NULL;
    $imageFileType = 'jpg';
  }       




if (file_exists($target_file)) {
    header("Location: dokumenti_change.php");
$_SESSION['status'] = '<div class="alert alert-danger">' . "Slika vec postoji." . '</div';
    exit; 
    
    $uploadOk = 0;
}   
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    header("Location: dokumenti_change.php");
$_SESSION['status'] = '<div class="alert alert-danger">' . "Slika je prevelika, maksimalna velicina je 5MB." . '</div';
    exit; 
   
    $uploadOk = 0;           
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    header("Location: dokumenti_change.php");
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Slika mora biti JPG, JPEG, PNG ili GIF formata." . '</div';
    exit;  
    
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    header("Location: dokumenti_change.php");
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, slika nije upload-ovana." . '</div';
    exit;
            
  // if everything is ok, try to upload file
  } else {
        if($target_file != NULL){
      $target_file = $target_dir . $datum . '-' . $naslov . '.' . $imageFileType;
        }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) || $target_file == NULL) {
       
      $query = 'select * from dokumenti where id = '.$_REQUEST['dokument'];
      $result = $handle->query($query);
      $dokumenti = $result->fetch_assoc();
            if($dokumenti['slika'] != $target_file){
            $slika = $target_file;
            }else{
              $slika = $dokumenti['slika'];
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


              if (isset($_REQUEST['dokument']) && $_REQUEST['dokument']!='') 
              {   // It's an update
                $dokument = $_REQUEST['dokument'];
              
                $query = "update dokumenti
                          set 
                      datum        = '$datum',
                      kategorija   = '$kategorija',
                      naslov       = '$naslov', 
                      tekst        = '$tekst',
                      slika        = '$slika',
                      uneo         = '$uneo',
                      prikaz       = $prikaz,
                      datum_izmene =  now()
                          where id = $dokument";
                    $b = 1;
              }
              else 
              {         // It's a new story

                $query = "insert into dokumenti 
                            (datum, kategorija, naslov, tekst, slika, uneo, prikaz)
                          values 
                            ('$datum', '$kategorija', '$naslov', '$tekst', '$slika', '$uneo', $prikaz)";
                    $b = 2;
              }
            }
          }

$result = $handle->query($query);
if($result != NULL || $result != " "){


if (!$result) 
{
  if($b == 1)
  {
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije update-ovan." . '</div>';
  header("Location: dokumenti_change.php?dokument=".$dokument);
  }
  else if($b == 2)
  {
  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije upload-ovan." . '</div>';
  header("Location: dokumenti_add.php");
  }else{
    exit;
  }
}
if($b == 1)
{
$_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili dokument!" . '</div>';
header("Location: dokumenti_change.php?dokument=".$dokument);
} 
else if($b == 2)
{
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novi dokument!" . '</div>';
  header("Location: dokumenti_add.php");
}
}else{
  header("Location: dokumenti_lista.php");
  $_SESSION['status'] = '<div class="alert alert-success">' . "Doslo je do greske, molimo vas probajte ponovo" . '</div>';
  
}


?>
