<?php 
include("php/config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
}
$id = $_GET['uid'];
$yrid = $_GET['yrid'];
$dpid = $_GET['dpid'];

$Q = "Select * from elections where Department_id = $dpid and Year_id = $yrid and Election_status != 2";
$Qre = mysql_query($Q,$con);
$data = mysql_fetch_array($Qre);

include("php/onTablefunc.php");
$eid = $data['id'];
$sdate = $data['Start_date'];
$stime = $data['Start_time'];

$uQ = "select * from users where id = $id";
$uQ = mysql_query($uQ,$con);
$udata = mysql_fetch_array($uQ);
$stuname = $udata['First_name']." ".$udata['Last_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/userpanel.css">
	<link rel="stylesheet" type="text/css" href="css/declaredele.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
</head>
<body>
	<div class="main_container">
		<div class="topbar">
			<div>
				<a href="php/stulogin.php"><img src="images/voteicon.png"></a>
				<div class="menu_Items">
					<div class="election">
						<a href=""><button class="btn election " style="background:#778ca3; color:white;">Election</button></a>
					</div>
					<div class="cand_Apply">
						<a href="stuapply.php"><button class="btn Apply" >Apply</button></a>
					</div>
					<div class="result_View">
						<a href="php/resultcheck.php"><button class="btn result">Result</button></a>
					</div>
				</div>
			</div>
			<div class="stu_Info">
						<a class ="acc" href="stuacc
				.php">
						<span><?php echo $stuname; ?></span>
						<img src="images/stuinfo.png">
						</a>
						<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
					</div>
		</div>
		<div class="center_Portion">
			
			<div class="ele_Part">
				<span class="new_Election"> New Election Declared </span>
				<div class="details_Part">
					<div class="declared_ele">
						<span class="ele_Name"><?php echo $data['Name']." Election"; ?></span>
						<div class="election_Date">
							<span>Election Date:</span>
							<span><?php echo $data['Start_date']; ?></span>
						</div>
						<div class="election_Time">
							<span>Election Time:</span>
							<span><?php echo $data['Start_time']; ?></span>
						</div>
						<div class="time_Left">
							<span class="start_Text">Election Starts in:</span>
							<span id="count_Down" class="time_Count"></span>
						</div>
					</div>
					<div class="candids">
						<div class="cand_Heading">
							<span>Candidates</span>
						</div>
						<table>
							<tbody>
								<?php
								$Q= "Select * from candidate where Elections_id = $eid;";
								$Qob = mysql_query($Q,$con);
								if(!$Qob)
									die(mysql_error());
								
								while($data = mysql_fetch_array($Qob)) {
									$stud = getStuData($data['User_id'],$con);
									$name = $stud['First_name']." ".$stud["Last_name"]; 
								?>
								<tr>
									<td class="cand_img"><img src="images/candidate.png"></td>
									<td class="cand_Name"><?php echo $name; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var mySQLDate = '<?php echo $sdate; echo " ".$stime;?>';
		let d = new Date(Date.parse(mySQLDate.replace(/-/g, ' ')));
		let till_Date = new Date(mySQLDate).getTime();

		let x = setInterval(function() {
			let now = new Date().getTime();
	
			let distance = till_Date - now;
			let days = Math.floor(distance / (1000 * 60 * 60 * 24));
			let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			let seconds = Math.floor((distance % (1000 * 60)) / 1000);
			document.getElementById("count_Down").innerHTML = days + "d " + hours + "h "
  			+ minutes + "m " + seconds + "s ";
  			if (distance < 0) {
    			clearInterval(x);
    			document.getElementById("count_Down").innerHTML = "EXPIRED";
  			}

		},1000);
	</script>
</body>
</html>