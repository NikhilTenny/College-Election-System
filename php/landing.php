<?php

/*Creating a connection*/
$link = mysql_connect('localhost','root','');
if (!$link) {
	echo "Not Connected".mysql_error();
}
else {
	echo "Connected";
}

/*Selecting the specified database*/
$db = mysql_select_db('election',$link);
if (!$db) {
	echo "Database not selected".mysql_error();
}

else {
	echo "Database Selected";
}

$email_p = $_POST["Eid"];
if(isset($email)) {
	echo "$email_p";
}
else 
echo "Not got";

?>