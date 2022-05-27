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

  


  function login_form()
  {
    ?>
	<link href="css/style_v2_optimized.css" rel="stylesheet" type="text/css">
	<img class="background-image" src="img/login-whisp.png">
	
    <div id="content-container">
        <div id="login-container">
            <div id="login-sub-container">
                <div id="login-sub-header">
                    <img src="img/portal-logo.png" alt="logo">
                </div>
                <div id="login-sub">
                    <div id="forms">

                        
                        <form id="login_form" action="login.php" method="post" target="_top">
                            <div class="input-req-login"><label for="user">Korisnik</label></div>
                            <div class="input-field-login icon username-container">
                                <input name="username" id="user" autofocus="autofocus" value="" placeholder="Unesite korisnicko ime." class="std_textbox" type="text" tabindex="1" required="">
                            </div>
                            <div style="margin-top:30px;" class="input-req-login"><label for="pass">Lozinka</label></div>
                            <div class="input-field-login icon password-container">
                                <input name="password" id="pass" placeholder="Unesite lozinku." class="std_textbox" type="password" tabindex="2" required="">
                            </div>
                            <div style="width: 285px;">
                                <div class="login-btn">
                                    <button name="login" type="submit" id="login_submit" tabindex="3">Prijava</button>
                                </div>

                                                            </div>
                            <div class="clear" id="push"></div>
                        </form>

                    <!--CLOSE forms -->
                    </div>

                <!--CLOSE login-sub -->
                </div>
            <!--CLOSE login-sub-container -->
            </div>
        <!--CLOSE login-container -->
        </div>


    </div>	
	
	
    <?php
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
?>
