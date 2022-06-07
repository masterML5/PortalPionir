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

<div class="vremenska_prognoza_banner" style="display:grid; grid-template-columns:repeat(4, 3fr);">

<a class="weatherwidget-io" href="https://forecast7.com/sr/46d1019d67/subotica/" data-label_1="SUBOTICA" data-mode="Current" data-theme="ruby" >SUBOTICA</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<a class="weatherwidget-io" href="https://forecast7.com/sr/44d7920d45/belgrade/" data-label_1="BEOGRAD" data-mode="Current" data-theme="ruby" >BEOGRAD</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<a class="weatherwidget-io" href="https://forecast7.com/sr/43d8621d40/paracin/" data-label_1="PARAĆIN" data-mode="Current" data-theme="ruby" >PARAĆIN</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<a class="weatherwidget-io" href="https://forecast7.com/sr/43d2421d59/prokuplje/" data-label_1="PROKUPLJE" data-mode="Current" data-theme="ruby" >PROKUPLJE</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

</div>


<DIV id="content">

<DIV id="secondary-content">

<?php
  include("include/sadrzaj_levo.inc") ?>

<DIV id="primary-content">

<DIV class="home_news">
	<H2>Aktuelno</H2>

							<?php 
								prikazi_nove_vesti('%');
								//prikazi_nove_vesti('korporativna');
								//prikazi_nove_vesti('ostalo');
							?> 
				
</DIV>
</DIV><!-- primary-content | end -->

<DIV id="additional-content">

<?php
  include("include/sadrzaj_desno.inc") ?>

</DIV><!-- additional-content | end -->

</DIV><!-- content | end -->
<DIV id="footer">

<P>Razvoj: <a href="mailto:zoran.kostic@alfaplam.rs?Subject=Interni%20portal" target="_top">Zoran Kostić</A></P>
</DIV>
</DIV>
</DIV>

</BODY>
</HTML>
