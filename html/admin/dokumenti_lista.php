<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Alfa-Plam a.d. Vranje - Portal</TITLE>

<link href="css/style_v2_optimized.css" rel="stylesheet" type="text/css">

<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>


<h2>Alfa-Plam - unos podataka za portal</h2>
<?php
   
  include_once('include_fns.php');

  if (!check_auth_user()) 
  {
    login_form();
  }
  else 
  {
    $handle = db_connect();

	mysqli_set_charset ( $handle , 'utf8');
	
    $korisnik = get_korisnik_record($_SESSION['auth_user']);

	echo '<img class="background-image" src="img/login-whisp.png">';
    echo '<p>Dobrodošli, '.$korisnik['ime'];
    echo ' (<a href="logout.php">Odjava</a>) (<a href="index.php">Meni</a>) </p>';
    echo '<p>';

    $query = 'select * from dokumenti where uneo = \''.
           $_SESSION['auth_user'].'\' order by datum desc, redosled';
    $result = $handle->query($query);

    echo 'Vaši dokumenti: ';
    echo $result->num_rows;
    echo ' (<a href="dokumenti_add.php">Dodaj novi dokument</a>)';
    echo '</p><br /><br />';
    
    if ($result->num_rows) 
    {
      echo '<table border=1>';
      echo '<tr><th>Datum</th><th>Kategorija</th>';
      echo '<th>Naslov</th><th>Tekst</th><th>Akcije</th></tr>';
      while ($dokumenti = $result->fetch_assoc()) 
      {
        echo '<tr><td align=center>';
		echo date('d.m.Y', strtotime($dokumenti['datum']));
        echo '</td><td align=center>';
        echo $dokumenti['kategorija'];
        echo '</td><td>';
        echo $dokumenti['naslov'];
        echo '</td><td>';
        echo $dokumenti['tekst'];
        echo '</td><td>';
        {
          echo '[<a href="dokumenti_change.php?dokument='.$dokumenti['id'].'">Izmeni</a>] ';
          echo '[<a href="dokumenti_delete.php?dokument='.$dokumenti['id'].'">Briši</a>] ';
        }
        echo '</td></tr>';
      }
      echo '</table>';
    }
  }
?>
