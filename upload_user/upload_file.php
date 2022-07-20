<?php
session_start();
  if(empty($_FILES['fileToUpload']['tmp_name'])){
    header('Location: index.php');
  }
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  $file = $_FILES["fileToUpload"]["name"];
  $log_file = "../upload_log/upload.log";
  
  if ($_FILES["fileToUpload"]["error"] > 0) {
    echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
    die("<br><center><font color = \"RED\">Greška u prebacivanju fajla</font></center>");

  } else {
  	if (!file_exists($file_tmp)) {
  	  die("<br><center><font color = \"RED\">Greška u prebacivanju fajla. Proverite veličinu fajla!</font></center>");
  	}
  	
   // echo "Upload: " . $file . "<br>";
   // echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " kB<br>";
   // echo "Stored in: " . $file_tmp;
   $log_line = date("Y.m.d") . ' ' . date("H:i:s") . ' | ' . $_SERVER['REMOTE_ADDR'] . ' | ' . "" . ' | ' . $file . "\n";
  }
  $file = date("Y-m-d") . "_". $file;
  //if (!file_exists("../upload/" . $file)) {
  move_uploaded_file($file_tmp, "../upload/" . $file);
  $log_fh = fopen($log_file, 'a');  
  fwrite($log_fh, $log_line);
  fclose($log_fh);
  //} 
  $fileLink = "http://asoftweb.a-asoft.com/exchange/" . $file;
  // echo "<br><br><center>Fajl se nalazi na linku:<br> ". 
  //        "<a href=\"http://asoftweb.a-asoft.com/exchange/" . $file . "\" " . 
  //        "title=\"Lokacija iskopiranog fajla: \">" . "$fileLink" . "</a>" . "<br>";
  // echo "<br><br>Slanje gornjeg linka putem mail-a: <a href=\"mailto:?subject=Preuzimanje fajla&amp;body=Fajl se može preuzeti u roku od 7 dana sa lokacije: %0D%0A $fileLink\">E-MAIL</a>";
  // echo "<br><br>Fajl ce biti automatski obrisan nakon 7 dana";
  // echo "</center>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <link rel="stylesheet" href="../css/upload.css">
  <title>Document</title>
</head>
<body>
<div class="row mb-5 text-center text-white">
      <div class="col-lg-10 mx-auto">
        <h1 class="display-4">Uspešno ste postavili fajl na server!</h1>
        <p class="lead">Link za preuzimanje:<br>
        <a id="linkZaPreuz" href="http://asoftweb.a-asoft.com/exchange/<?php echo $file ?>">http://asoftweb.a-asoft.com/exchange/<?php echo $file ?></a>
     
      </div>
    </div>

    <div class="col-lg-10 mx-auto">
    <p class="lead email copy">
       <span>Kopirajte link : </span><i class="fa fa-clone" onclick="copyFunction()" aria-hidden="true"></i> 
    </p>
    <p id="infoCopy">

    </p>
  </div>
    <div class="col-lg-10 mx-auto">
      <p class="lead email">

       <span> Pošaljite link email-om : </span> <a href="mailto:?subject=Preuzimanje fajla&amp;body=Fajl se može preuzeti u roku od 7 dana sa lokacije: %0D%0A <?php echo $fileLink ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> </a>
      </p>
  </div>
  <div class="col-lg-10 mx-auto">
      <p class="lead email">

       <span>Povratak nazad : </span> <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
      </p>
  </div>

  <script src="../js/upload.js"></script>
</body>
</html>
