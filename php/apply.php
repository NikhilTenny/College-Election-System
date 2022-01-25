

<?php
include("config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
$id = $_SESSION['stu_Id'];
$eleid  = $_SESSION['ele_id'];


function pg_redirect($msg) {
	$_SESSION['result_msg'] = $msg;
	header("Location:/project/stuapply.php"); 
}

if($_POST['application'] == "SUBMIT") {
	$att = $_POST['attendance'];
	$desp = $_POST['desp'];
	if(($att > 0) && ($desp != "")){
		$checkob = mysql_query("select * from applicant where User_id = $id;",$con);
		$candcheckob = mysql_query("select * from candidate where User_id = $id and Elections_id = $eleid;",$con);
		if((mysql_num_rows($checkob) == 0) && (mysql_num_rows($candcheckob) == 0))  {  //check if the user has already submitted an application
			$inQ = "insert into applicant (Election_id,User_id,Attendance,Description) values($eleid,$id,$att,'$desp')";
			if(!mysql_query($inQ,$con)){
				die(mysql_error());
				pg_redirect("Error Occured!");
			}
			else {
				pg_redirect("Application submitted");	
			}
		}
		else {
			pg_redirect("Already Applied");
		}
	}
	else {
		
		pg_redirect("Error Occured!");
	}
}

?>