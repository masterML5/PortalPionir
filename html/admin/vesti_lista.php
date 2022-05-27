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

    $query = 'select * from vesti where uneo = \''.
           $_SESSION['auth_user'].'\' order by datum desc, redosled';
    $result = $handle->query($query);

    echo 'Vaše vesti: ';
    echo $result->num_rows;
    echo ' (<a href="vesti_add.php">Dodaj novu</a>)';
    echo '</p><br /><br />';
    
    if ($result->num_rows) 
    {
      echo '<table border=1>';
      echo '<tr><th>Datum</th><th>Kategorija</th>';
      echo '<th>Naslov</th><th>Skraćeni tekst</th><th>Tekst</th><th>Akcije</th></tr>';
      while ($vesti = $result->fetch_assoc()) 
      {
        echo '<tr><td align=center>';
		echo date('d.m.Y', strtotime($vesti['datum']));
        echo '</td><td align=center>';
        echo $vesti['kategorija'];
        echo '</td><td>';
        echo $vesti['naslov'];
        echo '</td><td>';
        echo $vesti['tekst'];
        echo '</td><td>';
        echo $vesti['tekst_ceo'];
        echo '</td><td>';

        {
          echo '[<a href="vesti_change.php?vest='.$vesti['id'].'">Izmeni</a>] ';
          echo '[<a href="vesti_delete.php?vest='.$vesti['id'].'">Briši</a>] ';
        }
        echo '</td></tr>';
      }
      echo '</table>';
    }
  }
?>
