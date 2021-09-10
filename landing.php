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
$fname_p = $_POST["Fname"];
$lname_p = $_POST["Lname"];
$dept_p = $_POST["Department"];
$year_p = $_POST["Year"];
$pswd_p = $_POST["Pwd"];

echo "You got:   ".$email_p."<br>";
echo "You got:   ".$fname_p."<br>";
echo "You got:   ".$lname_p."<br>";
echo "You got:   ".$dept_p."<br>";
echo "You got:   ".$year_p."<br>";
echo "You got:   ".$pswd_p."<br>";



?>