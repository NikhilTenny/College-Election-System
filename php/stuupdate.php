<?php 
include("config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");	
	exit();
}
	
$id = $_SESSION['stu_Id'];

// Redirect to previous page if an error happened while updating user details
function error_happened($msg) {
	$_SESSION['result_msg'] = $msg;
	echo $msg;
	header("Location:/project/stuedit.php");
	exit();
}

// Update the user details
function update_details($value,$colName,$id,$con) {
	if($value != ""){
		$updateQ = "update  users set $colName = '$value' where id = '$id';";
		if(!mysql_query($updateQ,$con))
			error_happened("An error Happened!");
	}
}

if($_POST['update'] == "Update") {
	$fname = $_POST['f_Name'];
	$lname = $_POST['l_Name'];
	$phno = $_POST['p_No'];
	$email = $_POST['email'];
	update_details($fname,'First_name',$id,$con);
	update_details($lname,'Last_name',$id,$con);
	update_details($phno,'Phone_no',$id,$con);
	update_details($email,'Email',$id,$con);
	error_happened("Profile Updated");

	}


?>