<?php
include("config.php");
include("onTablefunc.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
$id = $_SESSION['stu_Id'];

$qob = mysql_query("select * from user_login where id = $id",$con);
$data = mysql_fetch_array($qob);
$passre = $_POST["passre"];


if($_POST['pass'] == $_POST['passre']){
	$changeQ = "update  user_login set Password = '$passre' where id = '$id';";
	if(!mysql_query($changeQ,$con))
		echo "error has happened";
	else 
		header("Location:/project/stupass.php");

}
else {
	$_SESSION['pass_error'] = "Passwords doesn't match!";
	header("Location:/project/stupass.php");
}

?>