<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Alfa-Plam a.d. Vranje - Portal</TITLE>


<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>

<body>
<font size="2">
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
	
    $korisnik = get_imenik_record($_SESSION['auth_user']);

    echo '<p>Dobrodošli, ';
    echo ' (<a href="logout.php">Odjava</a>) (<a href="index.php">Meni</a>) </p>';
    echo '<p>';

    $query = 'select * from imenik where uneo = \''.
           $_SESSION['auth_user'].'\' order by datum_unosa desc';

    $result = $handle->query($query);

    echo 'Pregled imenika: ';
    echo $result->num_rows;
    echo ' (<a href="imenik_add.php">Dodaj novi zapis</a>)';
    echo '</p><br /><br />';
    
    if ($result->num_rows) 
    {
      echo '<table border=1>';
      echo '<tr><th>Šifra radnika</th><th>Prezime</th><th>Ime</th><th>Šifra OJ</th><th>Naziv OJ</th><th>E-mail</th><th>Broj mobilnog telefona</th><th>Broj fiksnog telefona</th><th>Broj lokala</th><th>Lice/služba</th><th>Naziv firme</th>';
      echo '<th>Datum unosa</th><th>Datum izmene</th><th>Uneo</th><th>Akcije</th></tr>';
      while ($imenik = $result->fetch_assoc()) 
      {
        echo '<tr><td>';
        echo $imenik['sifrad'];
        echo '</td><td>';
        echo $imenik['prezime'];
        echo '</td><td>';
        echo $imenik['ime'];
        echo '</td><td>';
        echo $imenik['sifoj'];
        echo '</td><td>';
        echo $imenik['nazoj'];
        echo '</td><td>';
        echo $imenik['email'];
        echo '</td><td>';
        echo $imenik['tel_mobilni'];
        echo '</td><td>';
        echo $imenik['tel_fiksni'];
        echo '</td><td>';
        echo $imenik['tel_lokal'];
        echo '</td><td>';		
        echo $imenik['lice_sluzba'];
        echo '</td><td>';		
        echo $imenik['firma_naziv'];
        echo '</td><td>';		
        echo $imenik['datum_unosa'];
        echo '</td><td>';
        echo $imenik['datum_izmene'];
        echo '</td><td>';

        echo $imenik['uneo'];
        echo '</td><td>';
        {
          echo '[<a href="imenik_change.php?imenik='.$imenik['id'].'">Izmeni</a>] ';
          echo '[<a href="imenik_delete.php?imenik='.$imenik['id'].'">Briši</a>] ';
        }
        echo '</td></tr>';
      }
      echo '</table>';
    }
  }
 
?>

</font>  
</body>
