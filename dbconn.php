<?php

echo "1";

try{

    $conn = new PDO('dblib:host=10.1.4.12;dbname=Registar', 'Korisnik', 'Alfa12345');

echo"2";

echo "Connected successfully<br />";

$statement = $conn->query("SELECT Alat FROM ZamenaAlata");


foreach ($statement as $key)
{
	print_r ($key);
	print '</br>';
}

echo "3";

print "5";

print "6";
	
	$conn = null;

echo "Connection closed";

}

catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>