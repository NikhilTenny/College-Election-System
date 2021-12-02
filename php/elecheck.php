<?php 
include("config.php");
$eQ = "select * from elections where Election_status = 0 or Election_status = 1";
$eQ_ob = mysql_query($eQ,$con);

while($data = mysql_fetch_array($eQ_ob)) {
	$eid = $data['id'];
	//Check if the end time and date is past the current date and time
	if($data['End_date'] <= date('Y-m-d')) {
		if($data['End_time'] <= date('H:i:s')) {
			mysql_query("update elections set Election_status = 2 where id = '$eid';",$con);
		}
	}
	if($data['Start_date'] <= date('Y-m-d')) {
		if($data['Start_time'] <= date('H:i:s')) {	
			mysql_query("update elections set Election_status = 1 where id = '$eid';",$con);
		}	
	}
}	
?>