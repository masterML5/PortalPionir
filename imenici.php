<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML xmlns="http://www.w3.org/1999/xhtml">

<?php
  include("include/zaglavlje.inc") ?>

<BODY>

<?php
  include("include/meni_sistemski.inc") ?>
  
<?php
  include("include/meni_glavni.inc") ?>

<DIV id="content">

<DIV id="secondary-content">

<?php
  include("include/sadrzaj_levo.inc") ?>

<DIV id="primary-content">

	<DIV class="home_news">
		<H2>Imenici</H2>
		<EM class="category_home_news">Spisak telefonskih brojeva i e-mail adresa</EM>
		<UL class="home_news_list">
			<LI>
			  <IMG alt="Brojevi lokala" src="img/phone_plain.jpg" width="94">
			  <P>U nastavku možete preuzeti fajlove sa lokalnim telefonskim brojevima, brojevima mobilnih telefona i e-mail adresama.</P>
			  <P>Molimo da prijavite sve eventualne greške ili dopune</P><BR>
				<DIV><A href="download/imenici/lokalni_telefoni.pdf" target=new>Lokalni telefonski brojevi </A></DIV>	  
				<DIV><A href="download/imenici/lokalni_telefoni_detaljno.pdf" target=new>Lokalni telefonski brojevi - detaljno</A></DIV>	  
				<DIV><A href="download/imenici/mobilni_telefoni.pdf" target=new>Brojevi mobilnih telefona </A></DIV>	
				<DIV><A href="download/imenici/email_adrese.pdf" target=new>E-mail adrese </A></DIV>	

				<DIV><br><A href="download/imenici/alco_group_lokali.pdf" target=new>Alco Group - lokalni brojevi </A></DIV>					
			 </LI>
		</UL>

		<DIV>
			<EM class="category_home_news">Pretražite kontakte</EM>
		<UL class="home_news_list">
			<LI>
			<p>Unesite deo teksta za pretragu</p>
			<form method="post" action="imenici.php?go" id="searchform">
				<input type="text" name="name">
				<input type="submit" name="submit" value="Traži">
			</form>
			</LI>
		</UL>			
		</DIV>		

		<?php

		if(isset($_POST['submit']))
		{
			if(isset($_GET['go']))
			{
				if(preg_match("/[A-Z | a-z | 0-9]+/", $_POST['name']))
				{
					$name=$_POST['name'];

					@ $db = new mysqli('localhost', 'root', '', 'alfaplam_portal');
					if (mysqli_connect_errno())
					{
						echo 'Greška: nemoguće povezivanje sa bazom. Probajte kasnije.';
						exit;
					}

					mysqli_set_charset ( $db , 'utf8');
					//echo mysqli_character_set_name($db);

					//-query the database table

					$query = "select * from imenik WHERE ime LIKE '%" . $name . "%' OR prezime LIKE '%" . $name ."%' OR tel_mobilni LIKE '%" . $name ."%'  OR tel_fiksni LIKE '%" . $name ."%' OR tel_lokal LIKE '%" . $name ."%' OR nazoj LIKE '%" . $name ."%' OR firma_naziv LIKE '%" . $name ."%' order by lice_sluzba, prezime, ime, nazoj";
					$result = $db->query($query);
					$num_results = $result->num_rows;

					if ($num_results<1)
					{
						echo '<ul class="home_news_list"><li><p>Nema podataka za zadati parametar: <b>'. $name .'</b></p></li></ul>';
						exit;
					}

					echo '<DIV id="primary-content">';
					echo '<DIV class="home_news">';

					echo '<table border="2">';

						for ($i=0; $i < $num_results; $i++)
						{
							$row = $result->fetch_assoc();

							if (Trim($row['prezime']).Trim($row['ime'])!="") echo '<tr><td>Prezime i ime: </td><td><B>'.Trim($row['prezime']).' '.Trim($row['ime']).'</B></td></tr>';
							if (Trim($row['nazoj'])!="") echo '<tr><td>Org.jed: </td><td>'.Trim($row['nazoj']).'</td></tr>';
							if (Trim($row['email'])!="") echo '<tr><td>E-mail: </td><td>'.Trim($row['email']).'</td></tr>';				
							if (Trim($row['tel_mobilni'])!="") echo '<tr><td>Mobilni telefon: </td><td>'.Trim($row['tel_mobilni']).'</td></tr>';		
							if (Trim($row['tel_fiksni'])!="") echo '<tr><td>Fiksni telefon: </td><td>'.Trim($row['tel_fiksni']).'</td></tr>';	
							if (Trim($row['tel_lokal'])!="") echo '<tr><td>Lokal: </td><td>'.Trim($row['tel_lokal']).'</td></tr>';		
							if (Trim($row['firma_naziv'])!="") echo '<tr><td>Firma: </td><td>'.Trim($row['firma_naziv']).'</td></tr>';							
							echo '<tr><td>&nbsp</td><td>&nbsp</td></tr>';
						}

					echo "</table>";	
						
					echo '</DIV>';
					echo '</DIV><!-- primary-content | end -->';
						
					$result->free();

					$db->close();
						
				}

			}
		}

		?>





		</DIV>
</DIV><!-- primary-content | end -->

<DIV id="additional-content">

<?php
  include("include/sadrzaj_desno.inc") ?>

</DIV><!-- additional-content | end -->

</DIV><!-- content | end -->
<DIV id="footer">


</DIV>
</DIV>
</DIV>

</BODY>
</HTML>
