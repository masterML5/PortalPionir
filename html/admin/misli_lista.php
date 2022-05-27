<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Alfa-Plam a.d. Vranje - Portal</TITLE>


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
    
    if ($result->num_rows) 
    {
      echo '<table border=1>';
      echo '<tr><th>Naslov</th><th>Autor</th>';
      echo '<th>Datum unosa</th><th>Tekst</th><th>Akcije</th></tr>';
      while ($misli = $result->fetch_assoc()) 
      {
        echo '<tr><td>';
        echo $misli['naslov'];
        echo '</td><td>';
        echo $misli['autor'];
        echo '</td><td>';
        echo $misli['datum_unosa'];
        echo '</td><td>';
        echo $misli['tekst'];
        echo '</td><td>';
        {
          echo '[<a href="misli_change.php?misao='.$misli['id'].'">Izmeni</a>] ';
          echo '[<a href="misli_delete.php?misao='.$misli['id'].'">Briši</a>] ';
        }
        echo '</td></tr>';
      }
      echo '</table>';
    }
  }
?>
