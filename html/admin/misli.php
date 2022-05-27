<?php
  include ('include_fns.php');

  if (isset($_REQUEST['misao']))
  {
    $misao = get_misao_record($_REQUEST['misao']);
  }
?>

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
  <td><textarea cols="80" rows="7" name="tekst" wrap="virtual"><?php echo $misao['tekst'];?></textarea>
  </td>
</tr>


<tr>
  <td align="center"><input type="submit" value="Snimi"></td>
</tr>

</table>
</form>