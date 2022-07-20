<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <title>Document</title>
</head>
<body>
<section>
  <div class="container p-5">
    <!-- For demo purpose -->
    <div class="row mb-5 text-center text-white">
      <div class="col-lg-10 mx-auto">
        <h1 class="display-4">Prebacivanje fajla na web server</h1>
        <p class="lead">Najveća dozvoljena veličina fajla (trenutno) je 2,5 GB<br>
      
      Ukoliko je fajl veći od 2,5 GB obratite se Čedi (lok. 734)</p>
      </div>
    </div>
    <!-- End -->


    <div class="row">
      <div class="col-lg-5 mx-auto">
        <div class="p-5 bg-white shadow rounded-lg"><img src="https://bootstrapious.com/i/snippets/sn-file-upload/img.png" alt="" width="200" class="d-block mx-auto mb-4 rounded-pill">

          <!-- Default bootstrap file upload-->

          <h6 class="text-center mb-4 info">
          Zabranjeno je prebacivanje audio i video materijala koji nije u vlasništvu Alco grupacije
          </h6>
          <!-- <h6 class="text-center mb-4 text-muted">
          Najveća dozvoljena veličina fajla (trenutno) je 2,5 GB
          </h6> -->
          <form action="upload_file.php" method="post" enctype="multipart/form-data">
          <label for="fileUpload" class="file-upload btn btn-primary btn-block rounded-pill shadow"><i class="fa fa-upload mr-2"></i>Izaberite fajl
                        <input id="fileUpload" name="fileToUpload"  type="file" required>
                    </label>
                    <div class="filenameCancel">

                      <p id="infoArea"> </p><i class='fa fa-times' aria-hidden='true' id='cancelinput'></i>  
                    </div>
                    <div class="divForUploadBtn">

                      <button type="submit" class="btn btn-danger rounded-pill shadow" id="uploadBtn">Upload</button>
                      <p id="warning"></p>
                    </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<script src="../js/upload.js"></script>
</body>
</html>