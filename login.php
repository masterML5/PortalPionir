<?php 
session_start();
include('admin/db_fns.php');
if(empty($_POST)){
    header('Location: upload_login.php');
}

// $username = $_POST['username'];
// $password = $_POST['password'];

if(isset($_POST['login'])){
    $con = db_connect();
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    $check_user = "SELECT * FROM korisnici WHERE korisnik = '$username'";
  
    $res = mysqli_query($con, $check_user);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['lozinka'];
       
       
    
       
      //  if(password_verify($password, $fetch_pass)){    
        if($password === $fetch_pass){    
            //$_SESSION['email'] = $email;
           // $status = $fetch['status'];
            $name = $fetch['ime'];
          //  $surname = $fetch['surname'];
           // $userid = $fetch['id'];
            $privileges = $fetch['nivo_ovlascenja'];
          //  $image = $fetch['img'];
         
            
             // $_SESSION['email'] = $email;
              $_SESSION['name'] = $name;// . ' ' . $surname;
              $_SESSION['loggedin'] = true;
             // $_SESSION['id'] = $userid;
              $_SESSION['privileges'] = $privileges;
             // $_SESSION['image'] = $image;

              

     
                if($privileges == 1){

                    header('location: upload_admin/index.php');
                }else{
                    header('location: upload_user/index.php');
                }
                
            
          
        }else{
            $_SESSION['status'] = "Pogrešan email ili lozinka!";
            header('location: upload_login.php');
            exit;
        }
    }else{
        $_SESSION['status'] = "Niste se još registrovali, za regiraciju pritisnite na dugme Registruj se";
        header('location: upload_login.php');
        exit;
    }
}