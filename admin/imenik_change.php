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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Imenik</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/status.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div id="status">
                
				<?php
				if(isset($_SESSION['status'])){  
					echo $_SESSION['status'];
					unset($_SESSION['status']);
				}
				?>
			
</div>
<div class="backBtn">
<a href="imenik_lista.php"><button type="button" class="btn btn-info">Povratak nazad</button></a>
</div>
<div class="container contact-form">
            <div class="contact-image">
                 <img src="../img/pionir-logo.png" alt="rocket_contact"/>
            </div>
            <form  action="imenik_submit.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="imenik" value="<?php echo $_REQUEST['imenik'];?>">
			<input type="hidden" name="korisnik" value="<?php echo $_SESSION['auth_user'];?>">
                <h3>Izmena u imeniku</h3>
               <div class="row">
                    <div class="col-md-6 imenik-forma">
                        <div class="form-group">
							<label for="sifrad">Sifra radnika</label>
                            <input type="text" name="sifrad" class="form-control imenik_input" placeholder="Sifra radnika" value="<?php echo $imenik['sifrad'];?>" required />
                        </div>
                        <div class="form-group">
							<label for="prezime">Prezime</label>
                            <input type="text" name="prezime" class="form-control imenik_input" placeholder="Prezime " value="<?php echo $imenik['prezime'];?>"  required/>
                        </div>
                        <div class="form-group">
							<label for="ime">Ime</label>
                            <input type="text" name="ime" class="form-control imenik_input" placeholder="Ime" value="<?php echo $imenik['ime'];?>" required/>
                        </div>
						<div class="form-group">
							<label for="sifoj">Sifra OJ</label>
                            <input type="text" name="sifoj" class="form-control imenik_input" placeholder="Sifra OJ" value="<?php echo $imenik['sifoj'];?>" required/>
                        </div>
						<div class="form-group">
							<label for="nazoj">Naziv OJ</label>
                            <input type="text" name="nazoj" class="form-control imenik_input" placeholder="Naziv OJ" value="<?php echo $imenik['nazoj'];?>" required/>
                        </div>
						<div class="form-group">
							<label for="email">Email</label>
                            <input type="text" name="email" class="form-control imenik_input" placeholder="Email" value="<?php echo $imenik['email'];?>" required/>
                        </div>
						<div class="form-group">
							<label for="tel_mobilni">Mobilni telefon</label>
                            <input type="text" name="tel_mobilni" class="form-control imenik_input" placeholder="Mobilni telefon" value="<?php echo $imenik['tel_mobilni'];?>" required/>
                        </div>
						<div class="form-group">
							<label for="tel_fiksni">Fiksni telefon</label>
                            <input type="text" name="tel_fiksni" class="form-control imenik_input" placeholder="Fiksni telefon" value="<?php echo $imenik['tel_fiksni'];?>" />
                        </div>
					
						<div class="form-group">
							<label for="tel_lokal">Telefon lokal</label>
                            <input type="text" name="tel_lokal" class="form-control imenik_input" placeholder="Telefon lokal" value="<?php echo $imenik['tel_lokal'];?>" />
                        </div>
						<div class="form-group">
						<label for="lice_sluzba">Lice/Služba</label>
						<select name="lice_sluzba" class="form-control imenik_input  imenik_select text-center" required>
							<option value="Lice" <?php if ($imenik['lice_sluzba']=='Lice') echo 'selected';?> >Lice</option>
							<option value="Sluzba" <?php if ($imenik['lice_sluzba']=='Sluzba') echo 'selected';?> >Sluzba</option>
							<option value="Ostalo" <?php if ($imenik['lice_sluzba']=='Ostalo') echo 'selected';?> >Ostalo</option>
						</select>
                        </div>
						<div class="form-group">
						<label for="firma_naziv">Naziv firme</label>
						<select name="firma_naziv" class="form-control imenik_input imenik_select text-center" required>
							<option value="Pionir Fabrika Subotica" <?php if ($imenik['firma_naziv']=='Pionir Subotica') echo 'selected';?>>Pionir Subotica</option>
							<option value="Pionir Hissar" <?php if ($imenik['firma_naziv']=='Pionir Hissar') echo 'selected';?>>Pionir Hissar</option>
							<option value="Pionir Paracin" <?php if ($imenik['firma_naziv']=='Pionir Paracin') echo 'selected';?>>Pionir Paracin</option>
							<option value="Pionir Beograd" <?php if ($imenik['firma_naziv']=='Pionir Beograd') echo 'selected';?>>Pionir Beograd</option>
						</select>
                        </div>
					
                      
                    </div>
					<div class="imenik_btn">
					<input type="submit" class="btnContact imenik_btn" value="Izmeni">
					</div>
                </div>
            </form>
</div>
</body>
</html>
