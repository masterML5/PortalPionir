<?php
include ('include_fns.php');

  if (isset($_REQUEST['misao']))
  {
    $misao = get_misao_record($_REQUEST['misao']);
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




<form action="misao_submit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="misao" value="<?php echo $_REQUEST['misao'];?>">
<input type="hidden" name="korisnik" value="<?php echo $_SESSION['auth_user'];?>">
<table>

<tr>
  <td>Naslov<td>
</tr>
<tr>
  <td><input size="80" name="naslov"
             value="<?php echo $misao['naslov'];?>"></td>
</tr>

<tr>
  <td>Autor<td>
</tr>
<tr>
  <td><input size="80" name="autor"
             value="<?php echo $misao['autor'];?>"></td>
</tr>


<tr>
  <td>Tekst misli (možete uneti i HTML tagove)</td>
</tr>
<tr>
  <td>
  
  <!-- <textarea cols="80" rows="7" name="tekst" wrap="virtual"><?php echo $misao['tekst'];?></textarea> -->
	<!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
	<textarea id="elm1" name="tekst" rows="15" cols="80" style="width: 80%">
		<?php echo $misao['tekst'];?>
	</textarea>  
  
  </td>
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