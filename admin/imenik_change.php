<?php
include ('include_fns.php');

  if (isset($_REQUEST['imenik']))
  {
    $imenik = get_imenik_record($_REQUEST['imenik']);
  }
  
?>

<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	// Default skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

</script>
<!-- /TinyMCE -->




<form action="imenik_submit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="imenik" value="<?php echo $_REQUEST['imenik'];?>">
<input type="hidden" name="korisnik" value="<?php echo $_SESSION['auth_user'];?>">
<table>

<tr>
  <td>Šifra radnika<td>
</tr>
<tr>
  <td><input size="80" name="sifrad"
             value="<?php echo $imenik['sifrad'];?>"></td>
</tr>

<tr>
  <td>Prezime<td>
</tr>
<tr>
  <td><input size="80" name="prezime"
             value="<?php echo $imenik['prezime'];?>"></td>
</tr>

<tr>
  <td>Ime<td>
</tr>
<tr>
  <td><input size="80" name="ime"
             value="<?php echo $imenik['ime'];?>"></td>
</tr>

<tr>
  <td>Šifra OJ<td>
</tr>
<tr>
  <td><input size="80" name="sifoj"
             value="<?php echo $imenik['sifoj'];?>"></td>
</tr>

<tr>
  <td>Naziv OJ<td>
</tr>
<tr>
  <td><input size="80" name="nazoj"
             value="<?php echo $imenik['nazoj'];?>"></td>
</tr>

<tr>
  <td>E-mail<td>
</tr>
<tr>
  <td><input size="80" name="email"
             value="<?php echo $imenik['email'];?>"></td>
</tr>

<tr>
  <td>Broj mobilnog telefona<td>
</tr>
<tr>
  <td><input size="80" name="tel_mobilni"
             value="<?php echo $imenik['tel_mobilni'];?>"></td>
</tr>

<tr>
  <td>Broj fiksnog telefona<td>
</tr>
<tr>
  <td><input size="80" name="tel_fiksni"
             value="<?php echo $imenik['tel_fiksni'];?>"></td>
</tr>

<tr>
  <td>Broj lokala<td>
</tr>
<tr>
  <td><input size="80" name="tel_lokal"
             value="<?php echo $imenik['tel_lokal'];?>"></td>
</tr>

<tr>
  <td>Lice/služba (0/1)</td>
</tr>
<tr>
  <td><input size="80" name="lice_sluzba"
             value="<?php echo $imenik['lice_sluzba'];?>"></td>
</tr>

<tr>
  <td>Naziv firme</td>
</tr>
<tr>
  <td>
	<select name="firma_naziv">
		<option value="ALFA-PLAM" <?php if ($imenik['firma_naziv']=='ALFA-PLAM') echo 'selected';?> >ALFA-PLAM</option>
		<option value="FOS" <?php if ($imenik['firma_naziv']=='FOS') echo 'selected';?> >FOS</option>
	</select>
	</td>
</tr>

<tr>
  <td align="center"><input type="submit" value="Snimi"></td>
</tr>

</table>
</form>