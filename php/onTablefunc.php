<?php 
	include('config.php');
	// Delete a user
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "delete from users where (id = $id)";
		if(mysql_query($q,$con)) {
			header("Location:/project/users.php");
		}
		else {
			header("Location:/project/users.php");
		}
	}

	// Return Department name 
	function getDepartment($dpid,$con){
		$dpquery = "select Department_name from department where(id = $dpid );";
		$dp = mysql_query($dpquery,$con);
		$department = mysql_fetch_array($dp);
		return $department['Department_name'];
	}

	// Return Year Name 
	function getYear($yrid,$con) {
		$yrquery = "select * from year where(id = $yrid);";
		$yr = mysql_query($yrquery,$con);
		$year = mysql_fetch_array($yr);
		return $year['Year_name'];
	}
?>