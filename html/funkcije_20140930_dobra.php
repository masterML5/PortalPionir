<?php

function prikazi_misao($ctip){
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

/*mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET COLLATION_CONNECTION='utf8_unicode_ci'");
*/

mysqli_set_charset ( $db , 'utf8');
//echo mysqli_character_set_name($db);

$query = "select * from misli where prikaz=1 order by id";

$result = $db->query($query);
$num_results = $result->num_rows;

if ($num_results<1)
{
	echo 'Trenutno nema nijedne misli u bazi.';
	exit;
}

$query = "select * from misli where prikaz=1 order by id limit ".date("z")%$num_results.", 1";
//echo $query;
$result = $db->query($query);
$row = $result->fetch_assoc();
	if ($row['naslov'] != null) 
		echo '<p><u>'.$row['naslov'].'</u></p>';
//echo '<p>'.$row['tekst'].'<br />- <i>'.$row['autor'].'</i> -</p>';
	echo '<p>'.$row['tekst'].'</p>';
	if ($row['autor'] != null) echo '<p>(<i>'.$row['autor'].'</i>)</p>';
		
/*$izabrana = Rand(0, $num_results-1);
	for ($i=0; $i < $num_results; $i++)
	{
		$row = $result->fetch_assoc();
		if ($i == $izabrana)
		{
		if ($row['naslov'] != null) 
			echo '<p><u>'.$row['naslov'].'</u></p>';
		echo '<p>'.$row['tekst'].'<br />- <i>'.$row['autor'].'</i> -</p>';
		echo date("z")%$num_results;
		break; 
		}
	}
   */
$result->free();

$db->close();
	
}
?>

<!-- ======================================================================================= -->

<?php

function prikazi_imenik($ctip){
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

/*mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET COLLATION_CONNECTION='utf8_unicode_ci'");
*/

mysqli_set_charset ( $db , 'utf8');
//echo mysqli_character_set_name($db);

$query = "select * from imenik order by prezime, ime, nazoj";

$result = $db->query($query);
$num_results = $result->num_rows;

if ($num_results<1)
{
	echo 'Trenutno nema nijednog podatkau tabeli Imenik.';
	exit;
}

echo '<DIV id="primary-content">';
echo '<DIV class="home_news">';

echo '<table border="2">';

	for ($i=0; $i < $num_results; $i++)
	{
		$row = $result->fetch_assoc();

		if (Trim($row['prezime']).Trim($row['ime'])!="") echo '<tr><td>Prezime i ime: </td><td>'.Trim($row['prezime']).' '.Trim($row['ime']).'</td></tr>';
		if (Trim($row['nazoj'])!="") echo '<tr><td>Org.jed: </td><td>'.Trim($row['nazoj']).'</td></tr>';
		if (Trim($row['email'])!="") echo '<tr><td>E-mail: </td><td>'.Trim($row['email']).'</td></tr>';				
		if (Trim($row['tel_mobilni'])!="") echo '<tr><td>Mobilni telefon: </td><td>'.Trim($row['tel_mobilni']).'</td></tr>';		
		if (Trim($row['tel_fiksni'])!="") echo '<tr><td>Fiksni telefon: </td><td>'.Trim($row['tel_fiksni']).'</td></tr>';	
		if (Trim($row['tel_lokal'])!="") echo '<tr><td>Lokal: </td><td>'.Trim($row['tel_lokal']).'</td></tr>';		
		echo '<tr><td>&nbsp</td><td>&nbsp</td></tr>';
	}

echo "</table>";	
	
echo '</DIV>';
echo '</DIV><!-- primary-content | end -->';
	
$result->free();

$db->close();
	
}
?>

<!-- ======================================================================================= -->


<?php

function prikazi_dokumenta($ckategorija){
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

mysqli_set_charset ( $db , 'utf8');


$query_kat = 'select * from kategorije where kategorija = "'.$ckategorija.'"';

$result_kat = $db->query($query_kat);
$num_results_kat = $result_kat->num_rows;

if ($num_results_kat<1)
	$ckategorija_naslov = $ckategorija;
else
{	
	$row = $result_kat->fetch_assoc();
	$ckategorija_naslov = $row['naslov'];
}


$query = 'select * from dokumenti where prikaz=1 and kategorija = "'.$ckategorija.'"';

$result = $db->query($query);
$num_results = $result->num_rows;

if ($num_results<1)
{
	echo '<B>Nema podataka za izabranu kategoriju: '.$ckategorija.'</B>';
	exit;
}


echo '<DIV class="home_news">';

echo '<H2>'.$ckategorija_naslov.'</H2>';

for ($i=0; $i < $num_results; $i++)
{
	$row = $result->fetch_assoc();


	echo '<EM class="category_home_news">'.$row['naslov'].'</EM>';
	echo '	<UL class="home_news_list">';
	echo '		<LI>';
	if (file_exists($row['slika']))
		echo '  	<IMG src="'.$row['slika'].'" width="150">';
	echo '		<DIV>';
	echo '			<P>'.$row['tekst'].'</P>';
	echo '		</DIV>';
				// ovde puni linkove
				$query_det = 'select * from dokumenti_fajlovi where id_dok = '.$row['id'].' and prikaz=1 order by redosled';

				$result_det = $db->query($query_det);
				$num_results_det = $result_det->num_rows;

				if ($num_results_det>0)
				for ($j=0; $j < $num_results_det; $j++)
				{		
					$row_det = $result_det->fetch_assoc();
					if (file_exists($row_det['fajl']))
						echo '<DIV><A href="'.$row_det['fajl'].'" target=new>'.$row_det['natpis'].'</A></DIV>';
				}				
	echo '		</LI>';
	echo '	</UL>';

}
echo '</DIV>';
   
$result->free();
$result_det->free();

$db->close();
	
}
?>


<!-- ======================================================================================= -->

<?php

function prikazi_info($ckategorija,  $pagenum){
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

mysqli_set_charset ( $db , 'utf8');

//This checks to see if there is a page number. If not, it will set it to page 1 

if(isset($_GET['pagenum']))
	$pagenum = $_GET['pagenum'];
else   
	$pagenum=1;


$query_kat = 'select * from kategorije where kategorija = "'.$ckategorija.'"';

$result_kat = $db->query($query_kat);
$num_results_kat = $result_kat->num_rows;

if ($num_results_kat<1)
	$ckategorija_naslov = $ckategorija;
else
{	
	$row = $result_kat->fetch_assoc();
	$ckategorija_naslov = $row['naslov'];
}


$query = 'select * from vesti where kategorija = "'.$ckategorija.'" and prikaz=1 order by datum desc, redosled desc';

$result = $db->query($query);
$num_results = $result->num_rows;


if ($num_results<1)
{
	echo '<B>Nema vesti za izabranu kategoriju: '.$ckategorija.'</B>';
	exit;
}

 //This is the number of results displayed per page 
 $page_rows = 4; 

//This tells us the page number of our last page 
 $last = ceil($num_results/$page_rows); 

 //this makes sure the page number isn't below one, or more than our maximum pages 
 if ($pagenum < 1) 
 { 
 $pagenum = 1; 
 } 
 elseif ($pagenum > $last) 
 { 
 $pagenum = $last; 
 } 
 
 //This sets the range to display in our query 
 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
 
 $query = 'select * from vesti where kategorija = "'.$ckategorija.'" and prikaz=1 order by datum desc, redosled desc '.$max;
 $data_p = $db->query($query);

 echo '<DIV class="home_news">';

 echo '<H2>'.$ckategorija_naslov.'</H2>';

 while($info = mysqli_fetch_array( $data_p )) 
 {
	echo '<EM class="category_home_news"><SPAN>'.date('d.m.Y', strtotime($info['datum'])).' </SPAN><A href="template_info_detail.php?vest='.$info['id'].'">'.$info['naslov'].'</A></EM>';
	echo '	<UL class="home_news_list">';
	echo '		<LI>';
	if (file_exists($info['slika']))
		echo '  	<IMG src="'.$info['slika'].'" width="150">';
	echo '		<DIV>';
	echo '			<P>'.$info['tekst'].'</P>';
	echo '		</DIV>';
	//echo '		<DIV><A href="template_info_detail.php?vest='.$info['id'].'">Pročitajte kompletnu vest.</A></DIV>';
	echo '		</LI>';
	echo '	</UL>';

}

 // This shows the user what page they are on, and the total number of pages
 
 echo '<br>';
 
 echo '<div class="paging">';

 	if ($pagenum > 1) 
	{
		$previous = $pagenum-1;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$previous'>&lt;&lt;Prethodna</a> </span>";				
	} 
   	
	if ($pagenum == 1)
	{
	} 
	else
	{
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=1'>1</a> </span>";		
	} 	
	
	if (($pagenum-3)>1)
	{
		echo '<span>...</span>';	
	} 

	if (($pagenum-2)>1)
	{
		$strana = $pagenum-2;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$strana'>".$strana." </a> </span>";		
	} 
	
	if ($pagenum-1>1)
	{
		$strana = $pagenum-1;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$strana'>".$strana." </a> </span>";		
	} 	
	
	echo "<span class='current'>$pagenum</span>";

	if ($pagenum+1<$last)
	{
		$strana = $pagenum+1;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$strana'>".$strana." </a> </span>";	
	} 	
	
	if ($pagenum+2<$last)
	{	
		$strana = $pagenum+2;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$strana'>".$strana." </a> </span>";	
	} 
	
	if (($pagenum+3)<$last)
	{
		echo "<span> ... </span>";	
	} 

	if ($pagenum == $last)
	{
	} 
	else
	{
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$last'>".$last." </a> </span>";	
	} 	
	
	if ($pagenum < $last) 
	{
		$next = $pagenum+1;
		echo "<span> <a href='template_info.php?kategorija=$ckategorija&pagenum=$next'>".'Sledeća&gt;&gt;</a> </span>';
	} 

echo '</DIV>';
echo '</DIV>';
   
$result->free();
$data_p->free();

$db->close();
	
}
?>


<!-- ======================================================================================= -->


<?php

function prikazi_info_vest($cvest)
{
	@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
	if (mysqli_connect_errno())
	{
		echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
		exit;
	}

	mysqli_set_charset ( $db , 'utf8');

	$query = 'select * from vesti where id = "'.$cvest.'" and prikaz=1';

	$result = $db->query($query);
	$num_results = $result->num_rows;

	if ($num_results<1)
	{
		echo '<B>Izabrana vest ne postoji: '.$cvest.'</B>';
		exit;
	}

	$row = $result->fetch_assoc();
	
	echo '<div class="clear"></div><span class="news-date">'.date('d.m.Y', strtotime($row['datum'])).'</span>';
	echo '<h2 class="inner">'.$row['naslov'].'</h2>';
	
	echo '	<UL class="home_news_list">';
	echo '		<LI>';
	if (file_exists($row['slika']))
		echo '  	<IMG src="'.$row['slika'].'" width="150">';
	echo '		<DIV>';
	echo '			<P>'.$row['tekst'].'</P>';
	echo '		</DIV>';

	// ovde puni linkove
	
	$query_det = 'select * from vesti_fajlovi where id = '.$row['id'].' and prikaz=1 order by redosled';

	$result_det = $db->query($query_det);
	$num_results_det = $result_det->num_rows;
	if ($num_results_det>0)
	{
		echo 'Prilozi:<br>';
		for ($j=0; $j < $num_results_det; $j++)
		{		
			$row_det = $result_det->fetch_assoc();
			if (file_exists($row_det['fajl']))
				echo '<DIV><A href="'.$row_det['fajl'].'" target=new>'.$row_det['natpis'].'</A></DIV>';
		}
	}				
	echo '		</LI>';
	echo '	</UL>';


   
$result->free();
$result_det->free();

$db->close();
	
}
?>


<!-- ======================================================================================= -->


<?php

function prikazi_nove_vesti($ckategorija)
{
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

mysqli_set_charset ( $db , 'utf8');

$query_kat = 'select * from kategorije where kategorija = "'.$ckategorija.'"';

$result_kat = $db->query($query_kat);
$num_results_kat = $result_kat->num_rows;

if ($num_results_kat<1)
	$ckategorija_naslov = $ckategorija;
else
{	
	$row = $result_kat->fetch_assoc();
	$ckategorija_naslov = $row['naslov'];
}

$query = 'select * from vesti where kategorija = "'.$ckategorija.'" and prikaz=1 order by datum desc, redosled desc limit 5';

$result = $db->query($query);
$num_results = $result->num_rows;

if ($num_results<1)
{
	echo '<B>Nema vesti za izabranu kategoriju: '.$ckategorija.'</B>';
	exit;
}


echo '<EM class="category_home_news">'.$ckategorija_naslov.'</EM>';	

for ($i=0; $i < $num_results; $i++)
{
	$row = $result->fetch_assoc();

	echo '	<UL class="home_news_list">';
	echo '		<LI>';
	if (file_exists($row['slika']))
		echo '  	<IMG src="'.$row['slika'].'" width="120">';

	echo '		<DIV><SPAN>'.date('d.m.Y', strtotime($row['datum'])).' </SPAN><A href="template_info_detail.php?vest='.$row['id'].'">'.$row['naslov'].'</A></DIV>';
	echo '			<P>'.$row['tekst'].'</P>';
	//echo '			<P>'.substr($row['tekst'], 0, 200).' ... </P>';	

//	echo '		<DIV><A href="template_info_detail.php?vest='.$row['id'].'"><br>Pročitajte kompletnu vest.</A></DIV>';			
	echo '		</LI>';
	echo '	</UL>';

}
echo '<font color="blue">~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</font><BR /><BR />';	
   
$result->free();

$db->close();
	
}
?>


<!-- ======================================================================================= -->


<?php

function prikazi_misli($strana){
@ $db = new mysqli( 'localhost', 'root', '', 'alfaplam_portal');
if (mysqli_connect_errno())
{
	echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
	exit;
}

mysqli_set_charset ( $db , 'utf8');

//This checks to see if there is a page number. If not, it will set it to page 1 

if(isset($_GET['pagenum']))
	$pagenum = $_GET['pagenum'];
else   
	$pagenum=1;

 
$query = 'select * from misli where prikaz=1 order by id';

$data = $db->query($query);	// 
$rows = $data->num_rows; 

 //This is the number of results displayed per page 
 $page_rows = 5; 

//This tells us the page number of our last page 
 $last = ceil($rows/$page_rows); 

 //this makes sure the page number isn't below one, or more than our maximum pages 
 if ($pagenum < 1) 
 { 
 $pagenum = 1; 
 } 
 elseif ($pagenum > $last) 
 { 
 $pagenum = $last; 
 } 
 
 //This sets the range to display in our query 
 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
 
 $query = "select * from misli where prikaz=1 order by id $max ";
 $data_p = $db->query($query);
 
 echo '<DIV class="home_news">';
 echo '<H2>Misli</H2>';
 
  //This is where you display your query results
 while($info = mysqli_fetch_array( $data_p )) 
 { 
  	//echo '<EM class="category_home_news"></EM>';

	echo '	<UL class="home_news_list">';
	echo '		<LI>';
	echo '		<DIV>';
	echo '			<P><B><U>'.$info['naslov'].'</U></B></P><br>';	
	echo '			<P>'.$info['tekst'].'</P>';	
	

	if ($info['autor'] != null) 
	{
		echo '<P><B>('.$info['autor'].')</B></P>';	
	}	

	echo '		</DIV></LI></UL>';
	echo '<EM class="category_home_news"></EM>';
 }  


 // This shows the user what page they are on, and the total number of pages
 
 echo '<br>';
 
 echo '<div class="paging">';

 	if ($pagenum > 1) 
	{
		$previous = $pagenum-1;
		echo "<span> <a href='template_misli.php?pagenum=$previous'>"."&lt;&lt;Prethodna</a> </span>";
	} 
   	
	if ($pagenum == 1)
	{
	} 
	else
	{
		echo '<span> <a href="template_misli.php?pagenum=1">'.'1</a> </span>';
	} 	
	
	if (($pagenum-3)>1)
	{
		echo '<span>...</span>';	
	} 

	if (($pagenum-2)>1)
	{
		$strana = $pagenum-2;
		echo "<span> <a href='template_misli.php?pagenum=$strana'>$strana </a> </span>";	
	} 
	
	if ($pagenum-1>1)
	{
		$strana = $pagenum-1;
		echo "<span> <a href='template_misli.php?pagenum=$strana'>$strana </a> </span>";	
	} 	
	
	echo "<span class='current'>$pagenum</span>";

	if ($pagenum+1<$last)
	{
		$strana = $pagenum+1;
		echo "<span> <a href='template_misli.php?pagenum=$strana'>$strana </a> </span>";	
	} 	
	
	if ($pagenum+2<$last)
	{	
		$strana = $pagenum+2;
		echo "<span> <a href='template_misli.php?pagenum=$strana'>$strana </a> </span>";	
	} 
	
	if (($pagenum+3)<$last)
	{
		echo "<span> ... </span>";	
	} 

	if ($pagenum == $last)
	{
	} 
	else
	{
		echo "<span> <a href='template_misli.php?pagenum=$last'>$last </a> </span>";	
	} 	
	
	if ($pagenum < $last) 
	{
		$next = $pagenum+1;
		echo "<span> <a href='template_misli.php?pagenum=$next'>".'Sledeća&gt;&gt;</a> </span>';
	} 
echo '</div>'; 
echo '<br><br>'; 
   
echo '</DIV>';

$data->free();
$data_p->free();
$db->close();
	
}
?>

<!-- ======================================================================================= -->

