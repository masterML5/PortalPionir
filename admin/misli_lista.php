<?php
include_once('include_fns.php');
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Alfa-Plam a.d. Vranje - Portal</TITLE>


<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>

<?php
   

  if (!check_auth_user()) 
  {
    login_form();
  }
  else 
  {
    $handle = db_connect();

	mysqli_set_charset ( $handle , 'utf8');
	
    $korisnik = get_korisnik_record($_SESSION['auth_user']);

    echo '<p>Dobrodošli, '.$korisnik['ime'];
    echo ' (<a href="logout.php">Odjava</a>) (<a href="index.php">Meni</a>) </p>';
    echo '<p>';

    $query = 'select * from misli where korisnik = \''.
           $_SESSION['auth_user'].'\' order by datum_unosa desc';
    $result = $handle->query($query);

    echo 'Vaše misli: ';
    echo $result->num_rows;
    echo ' (<a href="misli_add.php">Dodaj novu</a>)';
    echo '</p><br /><br />';
    ?>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styleMisliLista.css">
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<thead>
						<tr>
							<th class="text-center"><span>Autor</span></th>
							<th class="text-center"><span>Datum</span></th>
							<th class="text-center"><span>Prikaz</span></th>
							<th class="text-center"><span>Tekst</span></th>
							<th class="text-center"><span>Izmeni/Obrisi</span></th>
						</tr>
          </thead>
					<tbody>
          <tr>
          <?php
    if ($result->num_rows) 
    {
      
      while ($misli = $result->fetch_assoc()) 
      {
  
?>

						
							<td>
								<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
								<p class="user-link"><?php  echo $misli['autor']; ?></p>
								<!-- <span class="user-subhead">Admin</span> -->
							</td>
							<td>
                <?php
								  echo $misli['datum_unosa'];
                  ?>
							</td>
							<td class="text-center">
								<span class="label label-default">
                  <?php
                  if($misli['prikaz'] == 1){
                    echo 'Da';
                  }else
                  echo 'Ne';
                  ?>
                </span>
							</td>
							<td class="text-center">
							 <p>
                 <?php 
                 echo $misli['tekst'];
                 ?>
               </p>
							</td>
							<td style="width: 20%;">
								
								<a href="<?php echo 'misli_change.php?misao='.$misli['id'].' '?> " class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a href="<?php echo 'misli_delete.php?misao='.$misli['id'].' '?> " class="table-link danger">
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


