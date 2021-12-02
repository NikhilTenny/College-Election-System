<?php 
include("php/config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
	exit();
}
$id = $_SESSION['stu_Id'];

//Retrive the name of the student who is logged in 	
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
	<link rel="stylesheet" type="text/css" href="css/declaredele.css">
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
						<a href=""><button class="btn Apply" >Apply</button>
					</div></a>
					<div class="result_View">
						<a href=""><button class="btn result">Result</button>
					</div></a>
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
			<span class="simple_text"> NO ELECTIONS</span>
		</div>
	</div>
</body>
</html>