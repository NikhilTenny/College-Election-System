<?php 
include("config.php");

$ename = $_POST['election_Name'];
$deptname = $_POST['Department'];
$yearname = $_POST['year'];
$sdate = date($_POST['start_Date']);
$stime = $_POST['start_Time'];
$edate = date($_POST['end_Date']);
$etime = $_POST['end_Time'];

$flag = 0; //To check if any error occured
$nowdate = date('Y-m-d');  //current date


// Return the id of the given depaartment name
function getdeptid($deptname,$con) {
	$idQ = "select * from department where Department_name = '$deptname';";
	$Qresult = mysql_query($idQ,$con);
	$result = mysql_fetch_array($Qresult);
	return $result['id'];
}

// Return the id of the given year name
function getyearid($yearname,$con) {
	$idQ = "select * from year where Year_name = '$yearname';";
	$Qresult = mysql_query($idQ,$con);
	$result = mysql_fetch_array($Qresult);
	return $result['id'];
}
// Return id of the newly created election	
function getele_Id($con) {
	$geteidQ = "select * from elections order by id DESC limit 1;";
	$geteid_ob = mysql_query($geteidQ,$con);
	$geteid_r = mysql_fetch_array($geteid_ob);
	return $geteid_r['id'];
}

// Return the list of students in the specified department and year
function getVoters($dpid,$yrid,$con) {
	$Query = "select * from users where Department_id = '$dpid' and Year_id = '$yrid';";
	if(!($exeQuery = mysql_query($Query,$con))) {
		die(mysql_error());
		$flag = 1;
	}
	else {
		$exeQuery = mysql_query($Query,$con);
		return $exeQuery;
	}
}

// Insert the number of voters in newly created election
function insert_no_voters($voters,$eid,$con){
	$num_voters = mysql_num_rows($voters);
	$upQ = "update elections set Voters = '$num_voters' where id = '$eid';";
	if(!mysql_query($upQ,$con))
		$flag = 1;
}

// Insert the voters in the election to the voters table
function setVotersList($voters,$eid,$con) {
	while($data = mysql_fetch_array($voters)) {
		$uid = $data['id'];
		$inQ = "insert into voters_list (User_id,Election_id,Vote_status) values('$uid','$eid',0);";
		if(!mysql_query($inQ,$con)) {
			die(mysql_error());
			$flag = 1;
			break;
		}
		}
}

$dpid = getdeptid($deptname,$con);
$yrid = getyearid($yearname,$con);

// If the starting date is same as or before the ending date
if($sdate <= $edate) {
	$inQ = "insert into elections (Name,Department_id,Year_id,Election_status,Start_date,Start_time,End_date,End_time) values 
								  ('$ename','$dpid','$yrid',0,'$sdate','$stime','$edate','$etime');";
	if(!mysql_query($inQ,$con)) {
		$flag = 1;
	}
	$eid = getele_Id($con);
	$voters = getVoters($dpid,$yrid,$con);
	insert_no_voters($voters,$eid,$con);
	setVotersList($voters,$eid,$con);
	 if(flag == 1) 						//An error occured
	 	header("Location:/project/createElection.php?cr_Reply=Unexpected Error Occured!");
	 else 
	 	header("Location:/project/createElection.php?cr_Reply=Election Declaration Successfull");
	 
}
else 
header("Location:/project/createElection.php?cr_Reply=Invalid Details");
?>