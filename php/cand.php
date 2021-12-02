<?php
include("config.php");
session_start();
if(!isset($_SESSION['ad_Id'])) {
	header("Location:/project/index.php");
}
$appid = $_GET['appid'];
$uid = $_GET['uid'];

$eQ = "select Election_id from applicant where id = '$appid';";
$eresult = mysql_query($eQ,$con);
$ele_id = mysql_fetch_array($eresult)["Election_id"];

function pg_redirect($msg,$uid,$appid) {
	$_SESSION['result_msg'] =$msg;
	echo $uid,$appid;
		header("Location:/project/applicantView.php?uid=".$uid."&appid=".$appid);
}
if(isset($_POST['decline'])){
	if($_POST['decline'] == "Decline"){
		$delQ = "delete from applicant where id = $appid";
		if(mysql_query($delQ,$con)) {
			header("Location:/project/applicants.php");
		}
		else 	
			pg_redirect("Error Occured!",$uid,$appi);
	}
}

if(isset($_POST['accept'])){
	if($_POST['accept'] == "Accept"){
		$inQ = "insert into candidate (User_id,Elections_id,Votes) values ($uid,$ele_id,0);";
		if(mysql_query($inQ,$con)){
			$delQ = "delete from applicant where id = $appid";
			if(mysql_query($delQ,$con))
			header("Location:/project/applicants.php");
	}
		else {
			pg_redirect("Error Occured!",$uid,$appid);
		}
	}
	else 
		pg_redirect("");
}
?>