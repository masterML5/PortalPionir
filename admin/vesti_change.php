<?php
include ('include_fns.php');

  if (isset($_REQUEST['vest']))
  {
	$vest = get_vest_record($_REQUEST['vest']);
  }
  
?>

<?php
  {
	define("L_LANG", "sr_CS"); 
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
 <!-- <script src="js/status.js"></script>   -->
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
				<input type="hidden" name="vest" value="<?php echo $_REQUEST['vest'];?>">
				<input type="hidden" name="autor" value="<?php echo $_SESSION['auth_user'];?>">
                <h3>Izmeni vest</h3>
               <div class="row">
                    <div class="col-md-6 form-opsti">
                        <div class="form-group">
							<label for="naslov">Naslov</label>
                            <input type="text" name="naslov" class="form-control" placeholder="Naslov" value="<?php echo $vest['naslov'] ?>" />
                        </div>
                       <div class="form-group">
						   <label for="kategorija">Kategorija</label>
						   
								<select name="kategorija" class="form-control"> 
								<option value="pravilnici" <?php if ($vest['kategorija']=="pravilnici"){echo "selected";};?>> Pravilnici</option>
								<option value="orgseme" <?php if ($vest['kategorija']=="orgseme"){echo "selected";};?>> Organizacione šeme</option>
								<option value="podaci" <?php if ($vest['kategorija']=="podaci"){echo "selected";};?>>Podaci</option>
								<option value="misija" <?php if ($vest['kategorija']=="misija"){echo "selected";};?>>Misija</option>
								<option value="saveti" <?php if ($vest['kategorija']=="saveti"){echo "selected";};?>>Saveti</option>
								<option value="obrasci <?php if ($vest['kategorija']=="obrasci"){echo "selected";};?>">Obrasci</option>
								<option value="sabloni" <?php if ($vest['kategorija']=="sabloni"){echo "selected";};?>>Šabloni i templejti</option>
								<option value="radnovreme" <?php if ($vest['kategorija']=="radnovreme"){echo "selected";};?>>Radno vreme</option>
								<option value="radnovremerestoran" <?php if ($vest['kategorija']=="radnovremerestoran"){echo "selected";};?>>Radno vreme restorana</option>
								<option value="radnovremepauza" <?php if ($vest['kategorija']=="radnovremepauza"){echo "selected";};?>>Radno vreme pauza</option>
								<option value="jelovnik" <?php if ($vest['kategorija']=="jelovnik"){echo "selected";};?>>Jelovnik</option>
								<option value="iso_procedure" <?php if ($vest['kategorija']=="iso_procedure"){echo "selected";};?>>ISO PROCEDURE</option>
								<option value="iso_poslovnik" <?php if ($vest['kategorija']=="iso_poslovnik"){echo "selected";};?>>ISO poslovnik</option>
								<option value="bezbednost" <?php if ($vest['kategorija']=="bezbednost"){echo "selected";};?>>Bezbednost i zaštita</option>
								<option value="korporativna" <?php if ($vest['kategorija']=="korporativna"){echo "selected";};?>>Korporativna obaveštenja</option>
								<option value="ostalo" <?php if ($vest['kategorija']=="ostalo"){echo "selected";};?>>Ostala obaveštenja</option>
								</select>
					   </div>
                        <div class="form-group">
							<label for="prikaz">Prikaz</label>
							<div class="switch_box box_1">
							<input type="checkbox"  id="checkbox" class="switch_1" onclick="checkboxValue(this)" name="prikaz" value="
							<?php 
							if($vest['prikaz'] == 1)
							{
								echo 'Yes' .'"' . 'checked';
							}
							else
							{
								echo 'No' . '"';
							}
							?>
							 />
							</div>
						</div>
                        
                    </div>
					<div class="col-md-12">
                        <div class="form-group">
							<label for="skrtekst">Unesite skraceni tekst vesti</label>
                            <textarea name="tekst" class="form-control skrtext" rows="3" cols="30" >
							<?php echo $vest['tekst'] ?>
							</textarea>
                        </div>
						</div>
                    <div class="col-md-12">
                        <div class="form-group">
							<label for="tekst">Unesite tekst vesti</label>
                            <textarea id="elm1" name="tekst_ceo" class="form-control" rows="7" cols="80" ><?php echo $vest['tekst_ceo'] ?></textarea>
                        </div>
                    </div>
					<div class="col-md-6 form-opsti">
					<div class="form-group">
						<label for="">Datum</label>
						<input type="date" name="datum" class="form-control" value="<?php echo $vest['datum'] ?>">
					</div>
					<div class="form-group">
						<label for="fileToUpload">Slika</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="form-control" value="<?php echo $vest['slika']?>">
					</div>
			</div>
					<div class="cold-md-6">
					<div class="form-group">
                            <input type="submit" name="btnSubmitChange" class="btnContact" value="Dodaj" />
                        </div>
                </div>
            </form>
</div>
</body>
</html>