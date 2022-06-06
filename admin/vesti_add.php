<?php
include ('include_fns.php');
?>

<?php

{
	define("L_LANG", "sr_CS"); // Srpski example
}
// IMPORTANT: Request the selected date from the calendar

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



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
 <script src="js/status.js"></script>  
	<title>Vesti</title>
</head>
<body>
<div id="status">
                
				<?php
				if(isset($_SESSION['status'])){  
					echo $_SESSION['status'];
					unset($_SESSION['status']);
				}
				?>
			
</div>
<div class="backBtn">
<a href="vesti_lista.php"><button type="button" class="btn btn-info">Povratak nazad</button></a>
</div>
<div class="container contact-form">
            <div class="contact-image">
                <img src="../img/pionir-logo.png" alt="rocket_contact"/>
            </div>
            <form action="vest_submit.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="autor" value="<?php echo $_SESSION['auth_user'];?>">
                <h3>Unesi novu vest</h3>
               <div class="row">
                    <div class="col-md-6 form-opsti">
                        <div class="form-group">
							<label for="naslov">Naslov</label>
                            <input type="text" name="naslov" class="form-control" placeholder="Naslov" value=""  required/>
                        </div>
                       <div class="form-group">
						   <label for="kategorija">Kategorija</label>
						   <select name="kategorija" class="form-control" required>

								<option value="pravilnici">Pravilnici</option>
								<option value="orgseme">Organizacione šeme</option>
								<option value="podaci">Podaci</option>
								<option value="misija">Misija</option>
								<option value="saveti">Saveti</option>
								<option value="obrasci">Obrasci</option>
								<option value="sabloni">Šabloni i templejti</option>
								<option value="radnovreme">Radno vreme</option>
								<option value="radnovremerestoran">Radno vreme restorana</option>
								<option value="radnovremepauza">Radno vreme pauza</option>
								<option value="jelovnik">Jelovnik</option>
								<option value="saveti">Saveti</option>
								<option value="iso_procedure">ISO PROCEDURE</option>
								<option value="iso_poslovnik">ISO poslovnik</option>
								<option value="bezbednost">Bezbednost i zaštita</option>
								<option value="korporativna">Korporativna obaveštenja</option>
								<option value="ostalo">Ostala obaveštenja</option>
  
 							</select>
					   </div>
                        <div class="form-group">
							<label for="prikaz">Prikaz</label>
							<div class="switch_box box_1">
                            <input type="checkbox" id="checkbox" class="switch_1" name="prikaz" class="form-control" checked="checked" value="Yes" onclick="checkboxValue(this)" />
							</div>
						</div>
                        
                    </div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="skrtekst">Skraceni tekst</label>
							<textarea name="tekst" id="skrtekst" class="form-control"  cols="30" rows="3"></textarea>
						</div>
					</div>
                    <div class="col-md-12">
                        <div class="form-group">
							<label for="tekst_ceo">Unesite tekst dokumenta</label>
                            <textarea id="elm1" name="tekst_ceo" class="form-control" rows="7" cols="80" ></textarea>
                        </div>
                    </div>
					<div class="col-md-6 form-opsti">
					<div class="form-group">
						<label for="">Datum</label>
						<input type="date" name="datum" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="fileToUpload">Slika</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
						
					</div>
			</div>
					<div class="cold-md-6">
					<div class="form-group">
                            <input type="submit" name="btnSubmitAdd" class="btnContact" value="Dodaj" />
                        </div>
                </div>
            </form>
</div>
</body>
</html>