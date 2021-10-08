<?php 
include("config.php");
$eQ = "select * from elections where Election_status = 0 or Election_status = 1";
$eQ_ob = mysql_query($eQ,$con);

// echo date('H:i:s: A')."<br>";
// echo date('Y-m-d');
//echo strtotime(exec("date"))."<br>"."<br>";
while($data = mysql_fetch_array($eQ_ob)) {
	// echo "start data: ".$data['Start_date'];
	// echo "<br>end data: ".$data['End_date'];
	// if($data['End_date'] >= date('Y-m-d'))
	// 	echo "Not happened";
	// else
	// 	echo "happened";

	// echo "start time: ".$data['Start_time'];
	// echo "<br>end time: ".$data['End_time'];
	// echo "<br>Current time: ".date('H-i-s');
	// if($data['End_time'] >= date('H-i-s'))
	// 	echo "Not happened";
	// else
	// 	echo "happened";


	// if($data['Start_date'] <= date('Y-m-d'))
	// echo strtotime($data['Start_time'])."<br>";
	// $t = time();
	//echo strtotime('Y-m-d')."<br><br>";
		

}	
?>