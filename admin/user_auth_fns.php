<?php
  function login($username, $password)
  // check username and password with db
  // if yes, return true
  // else return false
  {
  
	echo "select * from korisnici where korisnik='$username' and lozinka = '$password'";
    // connect to db
    $handle = db_connect();
    if (!$handle)
      return 0;

	mysqli_set_charset ( $handle , 'utf8');
	  
    $result = $handle->query("select * from korisnici where korisnik='$username' and lozinka = '$password'");
    if (!$result)
    {
      return 0; 
    }
    if ($result->num_rows>0)
    {
      return 1;
    }
    else 
    {
      return 0;
    }
  }

  function check_auth_user()
  // see if somebody is logged in and notify them if not
  {
    global $_SESSION;
    if (isset($_SESSION['auth_user']))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function check_permission($username, $story)
  // check user has permission to act on this story 
  {
    // connect to db
    $handle = db_connect();
    if (!$handle)
      return 0;

    if(!$_SESSION['auth_user'])
      return 0;

    $result = $handle->query("select * from writer_permissions wp, stories s
                              where wp.writer = '{$_SESSION['auth_user']}' and
                                  wp.page = s.page and
                                  s.id = $story
                              ");
    if (!$result)
    {
      return 0;
    }
    if ($result->num_rows>0)
    {
      return 1;
    }
    else 
    {
      return 0;
    }
  }


  function login_form()
  {
    ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/stylelogin.css">
	
    <body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../img/pionir-logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login.php" method="post" >
            <label for="username" class="labelform">Korisnik</label>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input name="username" id="user" autofocus="autofocus" value="" placeholder="Unesite korisnicko ime."class="form-control input_user" required>
						</div>
            <label for="username" class="labelform">Lozinika</label>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="pass" placeholder="Unesite lozinku."  class="form-control input_pass" value="" placeholder="password" required>
						</div>
					
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="login" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		

			</div>
		</div>
	</div>
</body>
	
	
    <?php
  }


?>
