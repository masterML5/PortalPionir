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
  $tekst_ceo         = $_POST['tekst_ceo'];
  $uneo          = $_POST['autor'];
  $tekst         = $_POST['tekst'];
  $tekst         = trim($tekst);
  $tekst_ceo         = addslashes($tekst_ceo);
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
   
   

      $query = "insert into vesti
                (datum, kategorija, naslov, tekst, tekst_ceo, slika, uneo, prikaz)
                values 
                ('$datum', '$kategorija', '$naslov', '$tekst', '$tekst_ceo', '$slika', '$uneo', $prikaz)";
               
              
            
     $query_run = mysqli_query($con, $query);






 
}else{

  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, vest nije upload-ovan." . '<br>' . $poruka . '</div>';
  header("Location: vesti_add.php");

    exit;
  }

if(mysqli_affected_rows($con) > 0){
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste uneli novi vest!" . '</div>';
  header("Location: vesti_add.php");
}else{
  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, vest nije upload-ovan." . '</div>';
  header("Location: vesti_add.php");
}
}



if(isset($_POST['btnSubmitChange'])){

  $datum         = $_POST['datum'];
  $kategorija    = $_POST['kategorija'];
  $naslov        = $_POST['naslov'];
  $tekst         = $_POST['tekst'];
  $tekst         = trim($tekst);
  $tekst_ceo         = $_POST['tekst_ceo'];
  $uneo          = $_POST['autor'];
  $tekst_ceo         = addslashes($tekst_ceo);
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

        $vest = $_REQUEST['vest'];
              
                $query = "update vesti
                          set 
                      datum        = '$datum',
                      kategorija   = '$kategorija',
                      naslov       = '$naslov', 
                      tekst        = '$tekst',
                      tekst_ceo    = '$tekst_ceo',
                      slika        = '$slika',
                      uneo         = '$uneo',
                      prikaz       = $prikaz,
                      datum_izmene =  now()
                          where id = $vest";
       
      
    
        $query_run = mysqli_query($con, $query);    
        //ako nema slike
      }else{
        $vest = $_REQUEST['vest'];
              
                $query = "update vesti
                          set 
                      datum        = '$datum',
                      kategorija   = '$kategorija',
                      naslov       = '$naslov', 
                      tekst        = '$tekst',
                      tekst_ceo    = '$tekst_ceo',
                      uneo         = '$uneo',
                      prikaz       = $prikaz,
                      datum_izmene =  now()
                          where id = $vest";
      
    
        $query_run = mysqli_query($con, $query);    
      }
   
}else{

  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, vest nije izmenjen." . '<br>' . $poruka . '</div>';
  header("Location: vesti_change.php?vest=".$vest);
  }

if(mysqli_affected_rows($con) > 0){
  $_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili vest!" . '</div>';
  header("Location: vesti_change.php?vest=".$vest);
}else{
  $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, vest nije izmenjen." . '</div>';
  header("Location: vesti_change.php?vest=".$vest);
}
}
?>
