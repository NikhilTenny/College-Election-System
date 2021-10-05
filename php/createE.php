<?php 
include("config.php");

$ename = $_POST['eletion_Name'];
$deptname = $_POST['Department'];
$yearname = $_POST['year'];
$sdate = $_POST['start_Date'];
$stime = $_POST['start_Time'];
$edate = $_POST['end_Date'];
$etime = $_POST['end_Time'];


function getdeptid($deptname,$con) {
	$idQ = "select * from department where Department_name = '$deptname';";
	$Qresult = mysql_query($idQ,$con);
	$result = mysql_fetch_array($Qresult);
	return $result['id'];
}

function getyearid($deptname,$con) {
	$idQ = "select * from year where Year_name = '$yearname'"
}

$dpid = getdeptid($deptname,$con);



?>