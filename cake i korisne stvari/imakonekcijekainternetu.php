<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML xmlns="http://www.w3.org/1999/xhtml">

<BODY>

<?php

 if(fopen("http://www.google.com/", "r")){

    // we are connected
	echo "ima konekcije";
	
	
} else {
    echo "nema konekcije";
  
}?>

<?php
//function to check if the local machine has internet connection
function checkConnection()
{
    //Initiates a socket connection to www.itechroom.com at port 80
    $conn = @fsockopen("www.itechroom.com", 80, $errno, $errstr, 30);
    if ($conn)
    {
        $status = "Connection is OK";
        fclose($conn);
    }
    else
    {
        $status = "NO Connection<br/>\n";
        $status .= "$errstr ($errno)";
    }
    return $status;
}
echo checkConnection();
?>

</BODY>
</HTML>
