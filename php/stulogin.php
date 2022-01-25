<?php 
	include("config.php");
	include('elecheck.php');
	include("onTablefunc.php");

	session_start();
	if(!isset($_SESSION['stu_Id'])) 
	header("Location:/project/index.php");
	$id = $_SESSION['stu_Id'];
	$stu_ob = mysql_query("select * from users where id = $id",$con); 
	if(!$stu_ob)
		header("location:/project/index.php");
	$stu_data = mysql_fetch_array($stu_ob);
	//Store the department and year id of the student
	if(mysql_num_rows($stu_ob) > 0) {
		$stu_dept = $stu_data['Department_id'];
		$stu_yr = $stu_data['Year_id'];
		$_SESSION['stu_dpid'] = $stu_dept;
		$_SESSION['stu_yrid'] = $stu_yr;
	}

	$ele_ob = mysql_query("select * from elections where Department_id = $stu_dept and Year_id = $stu_yr and Election_status != 2;",$con);
	if(!$ele_ob) 
		header("location:/project/index.php");
		
	$ele_data = mysql_fetch_array($ele_ob);

	if(mysql_num_rows($ele_ob) == 0) {
		header("location:/project/noele.php");
	}
	else {
		$e_id = $ele_data['id'];
		$ele_dept = $ele_data['Department_id'];
		$ele_yr = $ele_data['Year_id'];
		$ele_status = $ele_data['Election_status'];
		$ele_Name = $ele_data['Name'];		
		
		if(($stu_dept == $ele_dept) && ($stu_yr == $ele_yr)) {
			if($ele_status == 0) {
				$_SESSION['ele_id'] = $e_id;
				print_r($_SESSION['ele_id']);
				header("location:/project/userElection.php?uid=".$id."&yrid=".$ele_data['Year_id']."&dpid=".$ele_data['Department_id']);
			}
			else if($ele_status == 1) {
				$_SESSION['ele_id'] = $e_id;
				
				if(getVoteStatus($id,$e_id,$con) == 0)
					header("location:/project/userVoting.php");
				else {
					$_SESSION['stu_Id'] = $id;
					header("location:/project/noele.php"); 
				}
			}
			else {
				$_SESSION['stu_Id'] = $id;
				header("location:/project/noele.php");
			}
		}
	}	
?>