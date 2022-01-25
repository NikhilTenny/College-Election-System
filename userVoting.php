<?php 
include("php/config.php");
include("php/onTablefunc.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
$id = $_SESSION['stu_Id'];
$eid = $_SESSION['ele_id'];
$ename = getEleName($eid,$con);

//Retrive the name of the student who is logged in 	
$Qre = mysql_query("select * from users where id = $id",$con);
while($data = mysql_fetch_array($Qre)) {
	$stuname = $data['First_name']." ".$data['Last_name'];
}
$getQ = "select * from candidate where Elections_id = $eid;";
$getob = mysql_query($getQ,$con);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/userpanel.css">
	<link rel="stylesheet" type="text/css" href="css/Voting.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">

</head>
<body>
	<div class="main_container">
		<div class="topbar">
			<div>
				<a><img src="images/voteicon.png"></a>
				<div class="menu_Items">
					<div class="election">
						<a href=""><button class="btn election " style="background:#778ca3; color:white;">Election</button></a>
					</div>
					<div class="cand_Apply">
						<a href=""><button class="btn Apply" >Apply</button></a>
					</div>
					<div class="result_View">
						<a href=""><button class="btn result">Result</button></a>
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
			
			<div class="election_Name">
				<span><?php echo $ename." "; ?>Election</span>
			</div>
			<span class="error" style="color: orange;"><?php 
												if(isset($_SESSION["result_msg"]))
													echo $_SESSION['result_msg'];
													$_SESSION['result_msg'] = "";
											?>
												
						</span>
			<div class="cands_Area">
				<div class="tables">
					<div class="table Male">	
						<div class="Candidate_Heading">
							<span> Male Candidates </span>
						</div>
						<div class="table">
							<table id="realtable">
								<form action="php/vote.php" method="GET">
								<tbody>	
								<?php 
				$getQ = "select * from candidate where Elections_id = $eid;";
				$getob = mysql_query($getQ,$con);
				while($data = mysql_fetch_array($getob)) {
					$cand_uid = $data['User_id'];
					$cand_dpid = getdeptid($cand_uid,$con);
					$cand_yrid = getyrid($cand_uid,$con);
					$dpid = getdeptid($_SESSION['stu_Id'],$con);
					$yrid = getyrid($_SESSION['stu_Id'],$con);
					// echo "Candidate: ".$cand_dpid."    ".$cand_yrid."<br>";
					// echo "Studend: ".$dpid."    ".$yrid;

					if(($cand_dpid != $dpid) || ($cand_yrid != $yrid)) { 
						continue;
					}
					else {
	
						$stuob = mysql_query("select * from users where id = $cand_uid;",$con);
						$namearray = mysql_fetch_array($stuob);
						$cand_name = $namearray['First_name']." ".$namearray['Last_name'];
						if($namearray["Gender"] == 'Male') {														
					?>							
									<tr class = "inactive">
										<td class="male_img"></td>
										<td class="cand_name"> <?php echo $cand_name; ?> </td>
										<td class=""><input type="radio" name="male" value = <?php echo $cand_uid; ?> ></td>
									</tr>
								</tbody>
								<?php }}}?>
							</table>
						</div>
					</div>

					<div class="table Female">	
						<div class="Candidate_Heading">
							<span> Female Candidates </span>
						</div>
						<div class="table">
							<table id="realtable">
								<?php 
				$getQ = "select * from candidate where Elections_id = $eid;";
				$getob = mysql_query($getQ,$con);
				while($data = mysql_fetch_array($getob)) {
					$cand_uid = $data['User_id'];
					$cand_dpid = getdeptid($cand_uid,$con);
					$cand_yrid = getyrid($cand_uid,$con);
					$dpid = getdeptid($_SESSION['stu_Id'],$con);
					$yrid = getyrid($_SESSION['stu_Id'],$con);
					// echo "Candidate: ".$cand_dpid."    ".$cand_yrid."<br>";
					// echo "Studend: ".$dpid."    ".$yrid;

					if(($cand_dpid != $dpid) || ($cand_yrid != $yrid)) { 
						continue;
					}
					else {
	
						$stuob = mysql_query("select * from users where id = $cand_uid;",$con);
						$namearray = mysql_fetch_array($stuob);
						$cand_name = $namearray['First_name']." ".$namearray['Last_name'];
						if($namearray["Gender"] == 'Female') {														
					?>
								<tbody>
									<tr class = "inactive">
										<td class="female_img"></td>
										<td class="cand_name"> <?php echo $cand_name; ?> </td>
										<td class=""><input  type="radio" name="female" value = <?php echo $cand_uid; ?>></td>
									</tr>
								</tbody>
								
								<?php }}}?>
							</table>
						</div>
					</div>

				</div>	

				
			</div>
			<div class="vote_Switch">
				<input type="submit" value = VOTE class="vote_Button">
			</div>
		</div>
		</form>
	</div>
	<script type="text/javascript" src="js/voting.js"></script>
</body>
</html>