<?php 
include("php/config.php");
include("php/onTablefunc.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
$id = $_SESSION['stu_Id'];

//Retrive the name of the student who is logged in 	
$Qre = mysql_query("select * from users where id = $id",$con);
while($data = mysql_fetch_array($Qre)) {
	$stuname = $data['First_name']." ".$data['Last_name'];
}




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
			
			<a class ="acc" href="stuacc
				.php">
					<div class="stu_Info">
						<span><?php echo $stuname; ?></span>
						<img src="images/stuinfo.png">
						<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
					</div>
				</a>
		</div>
		<div class="center_Portion">			
			<div class="election_Name">
				<span>Third BCA Election</span>
			</div>
			<div class="cands_Area">
				<?php 
				$getQ = "select * from candidate;";
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
					
				<div class="boys">
					<div class="card" >
						<div class="card_Top">
							<div class="cand_Img"></div>
						</div>
						<div class="cand_Name">
						<span class="stu"><?php echo $cand_name; ?></span>
						<div  class="cast_Vote"></div>
						</div>
					</div>	
					<?php	
					}
				?>
				</div>	
				<div class="girls">
					<?php 
						if($namearray["Gender"] == 'Female') {
					?>
					<div class="card" >
						<div class="card_Top">
							<div class="cand_Img"></div>
						</div>
						<div class="cand_Name">
						<span class="stu"><?php echo $cand_name; ?></span>
						<div  class="cast_Vote"></div>
						</div>
					</div>
					<?php 
				}}}
					?>
				</div>
			</div>
		</div>	
		<div class="vote_Switch">
			<button class="vote_Button">VOTE</button>
		</div>
		
	</div>
	<script type="text/javascript" src="js/voting.js"></script>
</body>
</html>