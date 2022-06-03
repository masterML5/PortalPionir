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

    


if(isset($_REQUEST['slika']) && $_REQUEST['slika']!=''){

if (file_exists($target_file)) {
   
    $poruka = '<div class="alert alert-danger">' . "Slika vec postoji." . '</div';
    
    
    $uploadOk = 0;
}   
// Check file size
else if ($_FILES["fileToUpload"]["size"] > 5000000) {
   
    $poruka = '<div class="alert alert-danger">' . "Slika je prevelika, maksimalna velicina je 5MB." . '</div';
   
   
    $uploadOk = 0;           
}
// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
   
    $poruka = '<div class="alert alert-danger">' . "Slika mora biti JPG, JPEG, PNG ili GIF formata." . '</div';
     
    
    $uploadOk = 0;
}
}
if ($uploadOk != 0) {
   
  // if everything is ok, try to upload file
  
     
      $target_file = $target_dir . $datum . '-' . $naslov . '.' . $imageFileType;
      $slika = substr($target_file, 3);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     
            if(isset($_POST['prikaz']) &&
              $_POST['prikaz'] == 'Yes')
            {
                $prikaz = 1;
            }
            else
            {
                $prikaz = 0;
            }


             // It's an update
             if (isset($_REQUEST['dokument']) && $_REQUEST['dokument']!=''){
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
                $result = $handle->query($query);
             }               
}
else{
    if (isset($_REQUEST['dokument']) && $_REQUEST['dokument']!='') {
                        
                        if(isset($_POST['prikaz']) &&
                        $_POST['prikaz'] == 'Yes')
                    {
                        $prikaz = 1;
                    }
                    else
                    {
                        $prikaz = 0;
                    }



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
                    $result = $handle->query($query);
    }

}
    }




if (!$result && $uploadOk != 0) 
{

  
    $_SESSION['status'] = '<div class="alert alert-danger">' . "Doslo je do greske, dokument nije update-ovan." . '</div>' . '<br>' . $poruka;
  header("Location: dokumenti_change.php?dokument=".$dokument);
  
  
}
else 
{
$_SESSION['status'] = '<div class="alert alert-success">' . "Uspesno ste izmenili dokument!" . '</div>' . '<br>' . $poruka;;
header("Location: dokumenti_change.php?dokument=".$dokument);
} 

           
 
?>
