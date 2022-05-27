﻿<?php
  include ('include_fns.php');

  if (isset($_REQUEST['dokument']))
  {
	$dokument = get_dokument_record($_REQUEST['dokument']);
  }
  
?>

<?php
  {
	define("L_LANG", "sr_CS"); 
  }
// IMPORTANT: Request the selected date from the calendar
$mydate = isset($_POST["datum"]) ? $_POST["datum"] : "";
// Note: this sample doesn't show you how to use the $mydate variable with your database, but you can handle it as any other php variable in your script!
?>
<?php
// Load the calendar class
require('calendar/tc_calendar.php');
?>

<script language="javascript" src="calendar/calendar.js"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css">



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

<html>
<body>

<form action="dokument_submit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dokument" value="<?php echo $_REQUEST['dokument'];?>">
<input type="hidden" name="autor" value="<?php echo $_SESSION['auth_user'];?>">

<table>

<tr>
  <td>Datum</td>
</tr>
<tr>
  
  <td><?php
		  $myCalendar = new tc_calendar("datum", true, false);
		  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
		  //$myCalendar->setDate(date("d"), date("m"), date("Y"));
		  $myCalendar->setDate(date('d', strtotime($dokument['datum'])), date('m', strtotime($dokument['datum'])), date('Y', strtotime($dokument['datum'])));
		  $myCalendar->setPath("calendar/");
		  $myCalendar->setYearInterval(date("Y")-20, date("Y")+20);
		  //$myCalendar->dateAllow("2012-01-01", date("Y-m-d"));
		  $myCalendar->setAlignment("left", "bottom");
		  $myCalendar->writeScript();
		?>	
  </td>  
</tr>

<tr>
  <td>Kategorija</td>
</tr>
<tr>
  <td><select name="kategorija"> 
  <option value="pravilnici" <?php if ($dokument['kategorija']=="pravilnici"){echo "selected";};?>> Pravilnici</option>
  <option value="orgseme" <?php if ($dokument['kategorija']=="orgseme"){echo "selected";};?>> Organizacione šeme</option>
  <option value="podaci" <?php if ($dokument['kategorija']=="podaci"){echo "selected";};?>>Podaci</option>
  <option value="misija" <?php if ($dokument['kategorija']=="misija"){echo "selected";};?>>Misija</option>
  <option value="saveti" <?php if ($dokument['kategorija']=="saveti"){echo "selected";};?>>Saveti</option>
  <option value="obrasci <?php if ($dokument['kategorija']=="obrasci"){echo "selected";};?>">Obrasci</option>
  <option value="sabloni" <?php if ($dokument['kategorija']=="sabloni"){echo "selected";};?>>Šabloni i templejti</option>
  <option value="radnovreme" <?php if ($dokument['kategorija']=="radnovreme"){echo "selected";};?>>Radno vreme</option>
  <option value="radnovremerestoran" <?php if ($dokument['kategorija']=="radnovremerestoran"){echo "selected";};?>>Radno vreme restorana</option>
  <option value="radnovremepauza" <?php if ($dokument['kategorija']=="radnovremepauza"){echo "selected";};?>>Radno vreme pauza</option>
  <option value="jelovnik" <?php if ($dokument['kategorija']=="jelovnik"){echo "selected";};?>>Jelovnik</option>
  <option value="iso_procedure" <?php if ($dokument['kategorija']=="iso_procedure"){echo "selected";};?>>ISO PROCEDURE</option>
  <option value="iso_poslovnik" <?php if ($dokument['kategorija']=="iso_poslovnik"){echo "selected";};?>>ISO poslovnik</option>
  <option value="bezbednost" <?php if ($dokument['kategorija']=="bezbednost"){echo "selected";};?>>Bezbednost i zaštita</option>
</select></td>
</tr>

<tr>
  <td>Naslov</td>
</tr>
<tr>
  <td><input size="80" name="naslov" value="<?php echo $dokument['naslov'];?>"></td>>
</tr>

<tr>
  <td>Tekst dokumenta</td>
</tr>
<tr>
  <td>
  
  <!-- <textarea cols="80" rows="7" name="tekst" wrap="virtual"> <?php echo $dokument['tekst'];?> </textarea> -->
	<!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
	<textarea id="elm1" name="tekst" rows="15" cols="80" style="width: 80%">
		<?php echo $dokument['tekst'];?>
	</textarea>    
  
  </td>
</tr>

<tr>
  <td>Slika<td>
</tr>
<tr>
  <td><input size="80" name="slika" value="<?php echo $dokument['slika'];?>">></td>
</tr>

<tr>
  <td>Redosled<td>
</tr>
<tr>
  <td><input size="10" name="redosled" value="<?php echo $dokument['redosled'];?>"></td>
</tr>

<tr>
  <td>Prikazati</td>
</tr>
<tr>
  <td><input type="checkbox" name="prikaz" checked="checked" value="Yes" /></td>
</tr>

<tr>
  <td align="center"><input type="submit" value="Snimi"></td>
</tr>

</table>
</form>

</body>
</html>