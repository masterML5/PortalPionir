<?php
include_once('include_fns.php');

$con  = mysqli_connect('localhost','root','','alfaplam_portal');

if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}

$uploadOk = 1;

if(isset($_POST['btnSubmitAdd'])){
  
  

  $datum         = $_POST['datum'];
  $kategorija    = $_POST['kategorija'];
  $naslov        = $_POST['naslov'];
  $tekst         = $_POST['tekst'];
  $uneo          = $_POST['autor'];
  $tekst         = addslashes($tekst);
  $target_dir    = "../dokumenti/images/";
  $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['prikaz']) &&
  $_POST['prikaz'] == 'Yes')
{
    $prikaz = 1;
}
else
{
    $prikaz = 0;
}

 
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) { 
    $poruka = '<div class="alert alert-danger">' . "Slika je prevelika, maksimalna velicina je 5MB." . '</div';
    $uploadOk = 0;           
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $poruka = '<div class="alert alert-danger">' . "Slika mora biti JPG, JPEG, PNG ili GIF formata." . '</div';
    $uploadOk = 0;
}
//ako je dobra slika ili nema slike sledi insert
if ($uploadOk != 0 || $target_file == $target_dir) {
   
  // if everything is ok, try to upload file
        //ako ima slike
     if($target_file != $target_dir){
      $target_file = $target_dir . $datum . '-' . $naslov . '.' . $imageFileType;
    }
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $slika = substr($target_file, 3);
        
      }else{
        $slika = ' ';
      }
   
   

      $query = "insert into dokumenti 
                (datum, kategorija, naslov, tekst, slika, uneo, prikaz)
                values 
                ('$datum', '$kategorija', '$naslov', '$tekst', '$slika', '$uneo', $prikaz)";
               
              
            
     $query_run = mysqli_query($con, $query);






 
}else{

  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije upload-ovan." . '<br>' . $poruka . '</div>';
  header("Location: dokumenti_add.php");

    exit;
  }

if(mysqli_affected_rows($con) > 0){
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novi dokument!" . '</div>';
  header("Location: dokumenti_add.php");
}else{
  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije upload-ovan." . '</div>';
  header("Location: dokumenti_add.php");
}
}



if(isset($_POST['btnSubmitChange'])){

  $datum         = $_POST['datum'];
  $kategorija    = $_POST['kategorija'];
  $naslov        = $_POST['naslov'];
  $tekst         = $_POST['tekst'];
  $uneo          = $_POST['autor'];
  $tekst         = addslashes($tekst);
  $target_dir    = "../dokumenti/images/";
  $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['prikaz']) &&
  $_POST['prikaz'] == 'Yes')
{
    $prikaz = 1;
}
else
{
    $prikaz = 0;
}

 
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) { 
    $poruka = '<div class="alert alert-danger">' . "Slika je prevelika, maksimalna velicina je 5MB." . '</div';
    $uploadOk = 0;           
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $poruka = '<div class="alert alert-danger">' . "Slika mora biti JPG, JPEG, PNG ili GIF formata." . '</div';
    $uploadOk = 0;
}
//ako je dobra slika ili nema slike sledi insert
if ($uploadOk != 0 || $target_file == $target_dir) {
   
  // if everything is ok, try to upload file
        //ako ima slike
     if($target_file != $target_dir){
      $target_file = $target_dir . $datum . '-' . $naslov . '.' . $imageFileType;
    }
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $slika = substr($target_file, 3);

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
       
      
    
        $query_run = mysqli_query($con, $query);    
        //ako nema slike
      }else{
        $dokument = $_REQUEST['dokument'];
              
                $query = "update dokumenti
                          set 
                      datum        = '$datum',
                      kategorija   = '$kategorija',
                      naslov       = '$naslov', 
                      tekst        = '$tekst',
                      uneo         = '$uneo',
                      prikaz       = $prikaz,
                      datum_izmene =  now()
                          where id = $dokument";
      
    
        $query_run = mysqli_query($con, $query);    
      }
   
}else{

  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije izmenjen." . '<br>' . $poruka . '</div>';
  header("Location: dokumenti_change.php?dokument=".$dokument);
  }

if(mysqli_affected_rows($con) > 0){
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili dokument!" . '</div>';
  header("Location: dokumenti_change.php?dokument=".$dokument);
}else{
  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije izmenjen." . '</div>';
  header("Location: dokumenti_change.php?dokument=".$dokument);
}
}
?>
