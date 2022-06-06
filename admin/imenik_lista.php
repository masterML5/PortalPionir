<?php
include_once('include_fns.php');
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<TITLE>Pionir d.o.o - Portal</TITLE>


<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>

<body>

<?php
   


  if (!check_auth_user()) 
  {
    login_form();
  }
  else 
  {
    $handle = db_connect();

	mysqli_set_charset ( $handle , 'utf8');
	
    $korisnik = get_imenik_record($_SESSION['auth_user']);



    $query = 'select * from imenik where uneo = \''.
           $_SESSION['auth_user'].'\' order by datum_unosa desc';

    $result = $handle->query($query);

  ?>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
<link rel="stylesheet" href="css/styleMisliLista.css">
<header class="header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
        <div class="container">
            <img src="../img/pionir-logo.png"class="navbar-brand" alt="">
            <span class="vase_misli">Vaš imenik: <?php  echo $result->num_rows; ?></span>
            <a href="imenik_add.php"><button class="btn btn-warning dodaj">Dodaj novi kontakt</button></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right">
                    <a href="index.php"><button class="btn btn-primary">Meni</button></a>
                   <a href="logout.php"><button class="btn btn-danger">Odjava</button></a>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
        <div class="pretraga">

          <label id="searchlabel" for="myInput">Pretraži :</label>
          <input class="form-control mr-sm-2" type="search" id="myInput" onkeyup="myFunction()" placeholder="Pretraga" aria-label="Search">
        </div>
				<table class="table user-list" id="myTable">
					<thead>
						<tr>             
              <th class="text-center"><span>Šifra radnika</span></th>
              <th class="text-center"><span>Ime</span></th>
							<th class="text-center"><span>Prezime</span></th>
							<th class="text-center"><span>Naziv OJ</span></th>
							<th class="text-center"><span>Email</span></th>
							<th class="text-center"><span>Broj mobilnog</span></th>
							<th class="text-center"><span>Broj fisknog telefona</span></th>
							<th class="text-center"><span>Broj lokala</span></th>
							<th class="text-center"><span>Lice/Služba</span></th>
							<th class="text-center"><span>Naziv firme</span></th>
							<th class="text-center"><span>Izmeni/Obrisi</span></th>
						</tr>
          </thead>
					<tbody>
          <tr>
          <?php
    if ($result->num_rows) 
    {
      
      while ($imenik = $result->fetch_assoc()) 
      {
  
?>

                <td class="text-center">
								
								<p class="user-link autor"><?php  echo $imenik['sifrad']; ?></p>
								<!-- <span class="user-subhead">Admin</span> -->
							</td>
          
							<td class="text-center">
								
								<p class="user-link autor"><?php  echo $imenik['ime']; ?></p>
								<!-- <span class="user-subhead">Admin</span> -->
							</td>
							<td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['prezime']; ?></p>
							</td>
              
							<td class="text-center">
							 <p class="user-link autor">
                 <?php 
                 echo $imenik['nazoj'];
                 ?>
               </p>
							</td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['email']; ?></p>
              </td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['tel_mobilni']; ?></p>
              </td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['tel_fiksni']; ?></p>
              </td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['tel_lokal']; ?></p>
              </td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['lice_sluzba']; ?></p>
              </td>
              <td class="text-center">
              <p class="user-link autor"><?php  echo $imenik['firma_naziv']; ?></p>
              </td>
							<td class="text-center" style="width: 20%;">
								
								<a href="<?php echo 'imenik_change.php?imenik='.$imenik['id'].' '?> " class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a href="<?php echo 'imenik_delete.php?imenik='.$imenik['id'].' '?> " class="table-link danger remove" onClick="return confirm('Da li ste sigurni da zelite da obrisete kontakt?')">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</td>

						</tr>
            <?php
}

}
} ?>
            </tbody>
				</table>
			
	</div>
</div>
</div>
<script src="js/status.js"></script>


</body>
