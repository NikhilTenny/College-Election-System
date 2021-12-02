<?php 
include("php/config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) 
	header("Location:/project/index.php");
$id = $_SESSION['stu_Id'];


	
$Qre = mysql_query("select * from users where id = $id",$con);
while($data = mysql_fetch_array($Qre))
	$stuname = $data['First_name']." ".$data['Last_name'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/userpanel.css">
	<link rel="stylesheet" type="text/css" href="css/apply.css">
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
						<a href="php/stulogin.php"><button class="btn election " >Election</button></a>
					</div>
					<div class="cand_Apply">
						<a href=""><button class="btn Apply" style="background:#778ca3; color:white;">Apply</button>
					</div></a>
					<div class="result_View">
						<a href=""><button class="btn result">Result</button>
					</div></a>
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
		<div class="center_Portion" >
			<div class="application">
				<span class="heading">
					Candidate Application
				</span>
				<span class="error" style="color: orange;"><?php 
												if(isset($_SESSION["result_msg"]))
													echo $_SESSION['result_msg'];
													$_SESSION['result_msg'] = "";
											?>
												
						</span>
				<form action="php/apply.php" method="POST">      
					  <input name="attendance" type="number" class="feedback-input" placeholder="Attendance" required />   
					  <textarea name="desp" class="feedback-input" placeholder="Description" required></textarea>
					  <input type="submit" name = "application" value="SUBMIT"/>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>