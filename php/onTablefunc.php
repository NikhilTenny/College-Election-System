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
		echo $eid;
		if(mysql_query("delete from elections where id = $eid;",$con)) {
			echo "dfdfdf";
			header("Location:/project/elections.php");
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
	// Return details of the student of the specified id
	function getStuData($sid,$con) {
		$stu_ob = mysql_query("select * from users where id = '$sid';",$con);
		if($stu_ob)
			return mysql_fetch_array($stu_ob);
		else 
			return false;
	}
	// Return the election name of specified election id
	function getEleName($eid,$con) {
		$ele_ob = mysql_query("select * from elections where id = '$eid';",$con);
		if($ele_ob){
			$ele = mysql_fetch_array($ele_ob);
			return $ele['Name'];
		}
		else 
			return false;
	}

	// Return the election Status of specified election id
	function getE_State($eid,$con) {
		$ele_ob = mysql_query("select * from elections where id = '$eid';",$con);
		if($ele_ob){
			$ele = mysql_fetch_array($ele_ob);
			return $ele['Election_status'];
		}
		else 
			return false;
	}	
	// Return Applicant data
	function getAppData($appid,$con) {
		$Q = "select * from applicant where id = $appid";
		$Qob = mysql_query($Q,$con);
		if($Qob){
			$Qre = mysql_fetch_array($Qob);
			return $Qre;
		}
		else 
		return false;	
	}

	function getdeptid($uid,$con) {
		$getQ = mysql_query("select Department_id from users where id = $uid;",$con);
		$id = mysql_fetch_array($getQ)[0];
		return $id;
	}
	function getyrid($uid,$con) {
		$getQ = mysql_query("select Year_id from users where id = $uid;",$con);
		$id = mysql_fetch_array($getQ)[0];
		return $id;
	}

	function getVoteStatus($id,$con){
		$getQ = mysql_query("select Vote_Status from voters_list where User_id = $id;",$con);
		$status = mysql_fetch_array($getQ)[0];
		return $status;
	}

	
?>