<DIV id="smoothmenu1" class="ddsmoothmenu">
<ul>

<li><a href="#">Pionir</a>
  <ul>
  <li><a href="template_opsti.php?kategorija=misija">Misija i vizija</a></li>
  <li><a href="template_opsti.php?kategorija=podaci">Podaci</a></li>
  </ul>
</li>

<li><a href="index.php">Obaveštenja</a>
  <ul>
  <li><a href="template_info.php?kategorija=korporativna">Korporativna</a></li>
  <li><a href="template_info.php?kategorija=ostalo">Ostalo</a></li>  
  </ul>
</li>

<li><a href="#">Službena dokumenta</a>
  <ul>
  <li><a href="template_opsti.php?kategorija=orgseme">Organizacione šeme</a></li>
  <li>
	<a href="#">Standardizacija</a>
	<ul>
		<li><a href="template_opsti.php?kategorija=iso_poslovnik">Poslovnik o kvalitetu</a></li>
		<li><a href="template_opsti.php?kategorija=iso_procedure">Dokumentacija IMS-a</a></li>
	</ul>
  </li>
  <li><a href="template_opsti.php?kategorija=pravilnici">Ugovori i pravilnici</a></li>  
  <li><a href="template_opsti.php?kategorija=bezbednost">Bezbednost i zaštita na radu</a></li>
  <li><a href="template_opsti.php?kategorija=obrasci">Obrasci</a></li>
  <li><a href="template_opsti.php?kategorija=sabloni">Šabloni i logo znak</a></li>
  </ul>
</li>

<li><a href="#">Vremena</a>
  <ul>
  <li><a href="template_opsti.php?kategorija=radnovreme">Radno vreme</a></li>
  <li><a href="template_opsti.php?kategorija=radnovremerestoran">Raspored korišćenja toplog obroka u restoranu</a></li>
  <li><a href="template_opsti.php?kategorija=radnovremepauza">Raspored korišćenja pauze</a></li>  
  </ul>
</li>

<li><a href="https://asoftweb.a-asoft.com/Adresar" target="_blank">Imenik</a></li>

<li><a href="#">Kalendari</a>
  <ul>
  <li><a href="template_opsti.php?kategorija=kalendar">Poslovni kalendari</a></li>
  </ul>
</li>

<li><a href="#">Servisne informacije</a>
  <ul>
	  <li><a href="template_opsti.php?kategorija=jelovnik">Jelovnik</a></li>  
	  <li><a href="#">Dežurstvo vozila za hitne slučajeve</a></li>  	  
	  <li><a href="template_opsti.php?kategorija=odrzavanjeprijavaproblema">Održavanje - prijava problema na mašinama</a></li>  
  </ul>
</li>

<li><a href="#">Razno</a>
  <ul>
  <li><a href="template_misli.php">Misli</a></li>
  <li><a href="template_opsti.php?kategorija=saveti">Korisni saveti</a></li>
  </ul>
</li>
<li id="inputi"><a href="#">Vreme</a>
  <ul>
  <li style="background: #8A0808;"><label style="background: #8A0808; color: #FFFFFF; margin-left: 2px; text-align: center; display: block;">Izaberite vreme za prikaz</label></li>
  <li><a href='#'><input  id="vreme_sve" onclick="toggle(this)" type="checkbox" value="sve" />Sve</a></li>
  <li><a href='#'><input  id="vreme_sub" onclick="toggle(this)" type="checkbox" value="subotica"/>Subotica</a></li>
  <li><a href='#'><input  id="vreme_bgd" onclick="toggle(this)" type="checkbox" value="beograd" />Beograd</a></li>
  <li><a href='#'><input  id="vreme_par" onclick="toggle(this)" type="checkbox" value="paracin" />Paracin</a></li>
  <li><a href='#'><input  id="vreme_pro" onclick="toggle(this)" type="checkbox" value="prokuplje" />Prokuplje</a></li>
  <li><a href='#' style="text-align: center;"><input type="button"  id="potvrdi" value="Potvrdi" onclick="location.reload();"></a></li>
  </ul>
</li>

</ul>
<br style="clear: left" />
</div>
</DIV>
<div class="vremenska_prognoza_banner vremenska_sve" id="vremenska_baner" style="display:grid; grid-template-columns:repeat(4, 3fr);">
<p id= "subotica">
<a class="weatherwidget-io" href="https://forecast7.com/sr/46d1019d67/subotica/" data-label_1="SUBOTICA" data-mode="Current" data-theme="ruby" >SUBOTICA</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</p>
<p id= "beograd">
<a class="weatherwidget-io" href="https://forecast7.com/sr/44d7920d45/belgrade/" data-label_1="BEOGRAD" data-mode="Current" data-theme="ruby" >BEOGRAD</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</p>
<p id= "paracin" style="margin-left: -1px">
<a class="weatherwidget-io" href="https://forecast7.com/sr/43d8621d40/paracin/" data-label_1="PARAĆIN" data-mode="Current" data-theme="ruby" >PARAĆIN</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</p>
<p id= "prokuplje" style="margin-left: -1px">
<a class="weatherwidget-io" href="https://forecast7.com/sr/43d2421d59/prokuplje/" data-label_1="PROKUPLJE" data-mode="Current" data-theme="ruby" >PROKUPLJE</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<script src="vreme.js"></script>
</p>


</div>