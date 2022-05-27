<?php

function db_connect()
{
   $handle = new mysqli('localhost', 'root', '', 'alfaplam_portal'); 
   mysqli_set_charset ( $handle , 'utf8');
   
   if (!$handle)
   {
     return false;
   }
   return $handle;
}

function get_korisnik_record($username)
{
  $handle = db_connect();
  $query = "select * from korisnici where korisnik = '$username'";
  $result = $handle->query($query);
  return($result->fetch_assoc());
}

function get_misao_record($misao)
{
  $handle = db_connect();
  $query = "select * from misli where id = '$misao'";
  $result = $handle->query($query);
  return($result->fetch_assoc());
}

function get_vest_record($vest)
{
  $handle = db_connect();
  $query = "select * from vesti where id = '$vest'";
  $result = $handle->query($query);
  return($result->fetch_assoc());
}

function get_dokument_record($dokument)
{
  $handle = db_connect();
  $query = "select * from dokumenti where id = '$dokument'";
  $result = $handle->query($query);
  return($result->fetch_assoc());
  }
    
function get_imenik_record($imenik)
{
  $handle = db_connect();
  $query = "select * from imenik where id = '$imenik'";
  $result = $handle->query($query);
  return($result->fetch_assoc());
  }
   

function query_select($name, $query, $default='')
{
  $handle = db_connect();

  $result = $handle->query($query);

  if (!$result)
  {
    return('');
  }

  $select  = "<select name='$name'>";
  $select .= '<option value=""';
  if($default == '') $select .= ' selected ';
  $select .= '>-- Choose --</option>';

  for ($i=0; $i < $result->num_rows; $i++) 
  {
    $option = $result->fetch_array();
    $select .= "<option value='{$option[0]}'";
    if ($option[0] == $default) 
    {
      $select .= ' selected';
    }
    $select .=  ">[{$option[0]}] {$option[1]}</option>";
  }
  $select .= "</select>\n";

  return($select);
}

?>
