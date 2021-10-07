<?php 
	include('config.php');
	// Delete an user
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
	// Delete an election
	if(isset($_GET['election_Id'])) {
		$eid = $_GET['election_Id'];
		if(mysql_query("delete from elections where id = '$eid';",$con))
			header("Location:/project/elections.php");

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

	// Return the total number of voters in the specified election
	function get_No_of_voters($eid,$con) {
		$votersQ = "select * from voters_list where Election_id = '$eid';";
		if(!($voterQ_obj = mysql_query($votersQ,$con)))
			return false;
		else {
			$voterQ_obj = mysql_query($votersQ,$con);
			return mysql_num_rows($voterQ_obj);

		}
	}
	// Return details of the student with the specified id
	function getStuData($sid,$con) {
		$stu_ob = mysql_query("select * from users where id = '$sid';",$con);
		if($stu_ob)
			return mysql_fetch_array($stu_ob);
		else 
			return false;
	}
?>