<?php
$host = 'localhost'; // MYSQL database host adress
$db = 'alfaplam_portal'; // MYSQL database name
$user = 'root'; // Mysql Datbase user
$pass = ' '; // Mysql Datbase password
// Connect to the database
$link = mysql_connect($host, $user, $pass);
mysqli_set_charset ( $link , 'utf8');
mysql_select_db($db);
require "exportcsv.inc";
$table="imenik"; // this is the tablename that you want to export to csv from mysql.
exportMysqlToCsv($table);
?>