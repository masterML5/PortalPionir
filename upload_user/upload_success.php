<?php 
session_start();

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
        <a href="http://asoftweb.a-asoft.com/exchange/<?php echo $file ?>">http://asoftweb.a-asoft.com/exchange/<?php echo $file ?></a>
     
      </div>
    </div>
    <div class="col-lg-10 mx-auto">
      <p class="lead email">

       <span> Pošaljite link email-om : </span> <a href="mailto:?subject=Preuzimanje fajla&amp;body=Fajl se može preuzeti u roku od 7 dana sa lokacije: %0D%0A <?php echo $fileLink ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> </a>
      </p>
  </div>
</body>
</html>