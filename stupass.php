<?php
include("php/config.php");
include("php/onTablefunc.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
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
	<link rel="stylesheet" type="text/css" href="css/stuacc.css">
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
			<form action="php/Changepass.php" method="POST">
			<div class="profile">
				<div class="details">
					<div class="stu_Img"></div>
					<div>
						<span class="error"><?php 
												if(isset($_SESSION["pass_error"]))
													echo $_SESSION['pass_error'];
													$_SESSION['pass_error'] = "";
											?>
												
						</span>
					</div>
					<div>
						<input type="password" name="pass" placeholder="New Password">
					</div>
					<div>
						<input type="password" name="passre" placeholder="Confirm Password">
					</div>
					
					<input class="btn update" type="submit" name="Change" value="Change">
				</div>
			</div>
			</form>
		</div>
	</div>
</body>
</html>