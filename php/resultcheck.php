<?php
include("config.php");
include("onTablefunc.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");

}
$id = $_SESSION['stu_Id'];
$dpid = getdeptid($id,$con);
$yrid = getyrid($id,$con);
$getenameQ = "select * from elections where Department_id = $dpid and Year_id = $yrid and Election_status =  2 order by id";
$getenameob = mysql_query($getenameQ,$con);
if(!$getenameob)
die(mysql_error());
$edata = mysql_fetch_array($getenameob);
$eid = $edata['id'];

if(mysql_num_rows($getenameob) == 0 ) {
	header("location:/project/noresult.php");
}
if(isset($_GET['from'])) {

	unset($_GET['from']);
}
else
header("location:/project/resultView.php"); 


?>