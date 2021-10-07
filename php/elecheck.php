<?php 
include("config.php");
$eQ = "select * from elections where Election_status = 0 or Election_status = 1";
$eQ_ob = mysql_query($eQ,$con);
//echo date('h:m:s')."<br>";
//echo strtotime(exec("date"))."<br>"."<br>";
while($data = mysql_fetch_array($eQ_ob)) {

	//echo strtotime($data['Start_date'])."<br>";
	//echo strtotime(date('Y-m-d'))."<br>";
	//if($data['Start_date'] <= date('Y-m-d'))
	//echo strtotime($data['Start_time'])."<br>";
	$t = time();
	//echo strtotime('Y-m-d')."<br><br>";
		

}	
?>