<?php
$host = "localhost";
$user = "root";
$phppass = "";
$dbname = "election";

/* Connecting to database */
$con = mysql_connect($host,$user,$phppass);
if(!$con) {
	echo "Not Connected<br>".mysql_error();
}


/*Selecting the specified database*/
$db = mysql_select_db($dbname,$con);
if(!$db) {
	echo "Database Not selected<br>".mysql_error();
}

?>

