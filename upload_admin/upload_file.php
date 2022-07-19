<?php
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
   $log_line = date("Y.m.d") . ' ' . date("H:i:s") . ' | ' . $_SERVER['REMOTE_ADDR'] . ' | ' . $_SERVER['REMOTE_USER'] . ' | ' . $file . "\n";
  }
  
  //if (!file_exists("../upload/" . $file)) {
  move_uploaded_file($file_tmp, "../upload/" . $file);
  $log_fh = fopen($log_file, 'a');  
  fwrite($log_fh, $log_line);
  fclose($log_fh);
  //} 
  $fileLink = "http://asoftweb.a-asoft.com/exchange/" . $file;
  echo "<br><br><center>Fajl se nalazi na linku:<br> ". 
         "<a href=\"http://asoftweb.a-asoft.com/exchange/" . $file . "\" " . 
         "title=\"Lokacija iskopiranog fajla: \">" . "$fileLink" . "</a>" . "<br>";
  echo "<br><br>Slanje gornjeg linka putem mail-a: <a href=\"mailto:?subject=Preuzimanje fajla&amp;body=Fajl se može preuzeti u roku od 7 dana sa lokacije: %0D%0A $fileLink\">E-MAIL</a>";
  echo "<br><br>Fajl ce biti automatski obrisan nakon 7 dana";
  echo "</center>";
?>
