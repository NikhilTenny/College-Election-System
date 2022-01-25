<?php 
	include("config.php");
	include("onTablefunc.php");
	session_start();
	$id = $_SESSION['stu_Id'];
	$eid = $_SESSION['ele_id'];
	function pg_redirect($msg){
		$_SESSION['result_msg'] = $msg;
		header("Location:/project/userVoting.php");
	}
	if(($_GET['male']) && ($_GET['female'])) {
		if(getVoteStatus($id,$con) != 0) {
			pg_redirect("Already Voted");
			exit();
		}

		$m_uid = $_GET['male'];
		$f_uid = $_GET['female'];
		$mupQ = "update candidate set Votes = Votes + 1 where User_id = $m_uid and Elections_id = $eid";
		$fupQ = "update candidate set Votes = Votes + 1 where User_id = $f_uid and Elections_id = $eid";
		if(mysql_query($mupQ,$con))
			if(mysql_query($fupQ,$con)) {
				$upvotersQ = "update voters_list set Vote_Status =  1 where User_id = $id and Election_id = $eid;";			
				if(mysql_query($upvotersQ,$con)){
					header("location:/project/redirect.php");
				}
				else {
					pg_redirect("Unexpected Error!");
				}
			}	
		else {
			pg_redirect("Unexpected Error!");
		}		
	}
	else {
		pg_redirect("Invalid Entry!");
	}
?>