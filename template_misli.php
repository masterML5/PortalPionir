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

							<?php 
							   prikazi_misli($pagenum);
							?> 

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
