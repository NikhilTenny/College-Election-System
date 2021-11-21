<?php 
	include("config.php");
	$id = $_GET['sid'];
	session_start();
	$_SESSION['Stu_id'] = $id;
	$stu_ob = mysql_query("select * from users where id = $id",$con); 
	if(!$stu_ob) 
		header("location:/project/index.php");
	$stu_data = mysql_fetch_array($stu_ob);
	//Store the department and year id of the student
	if(mysql_num_rows($stu_ob) > 0) {
		echo "Dept= ".$stu_data['Department_id']."<br>";
		echo "Year= ".$stu_data['Year_id']."<br>";
		$stu_dept = $stu_data['Department_id'];
		$stu_yr = $stu_data['Year_id'];
	}

	$ele_ob = mysql_query("select * from elections where Department_id = $stu_dept and Year_id = $stu_yr;",$con);
	if(!$ele_ob) 
		header("location:/project/index.php");
	$ele_data = mysql_fetch_array($ele_ob);
	if(mysql_num_rows($ele_ob) == 0) {
		header("location:/project/noele.html");
	}
	else {
		echo "Dept=".$ele_data['Department_id']."<br>";
		echo "Year= ".$ele_data['Year_id']."<br>";
		$ele_dept = $ele_data['Department_id'];
		$ele_yr = $ele_data['Year_id'];
		$ele_status = $ele_data['Election_status'];
		if(($stu_dept == $ele_dept) && ($stu_yr == $ele_yr)) {
			if($ele_status == 0)
				header("location:/project/userElection.html");
			else if($ele_status == 1)
				header("location:/project/userVoting.html");
			else
				header("location:/project/noele.html");
		}
	}	
?>