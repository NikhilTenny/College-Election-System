<?php
include("php/config.php");
include("php/onTablefunc.php");
session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
	$uid = $_GET['uid'];
	$appid = $_GET['appid'];
	
	$studata = getStuData($uid,$con);
	$name = $studata['First_name']." ".$studata['Last_name'];
	$appdata = getAppData($appid,$con); 
	$att = $appdata["Attendance"];
	$dept = getDepartment($studata['Department_id'],$con);
	$yr = getYear($studata['Year_id'],$con);
	$desp = $appdata['Description'];


?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/panel.css">
	<link rel="stylesheet" type="text/css" href="css/appview.css">
	<link rel="stylesheet" type="text/css" href="css/userpanel.css">
	<script src = "js/panel.js" type="text/javascript">
	</script>
</head> 
<body>
	<div class="container">
		<div class="navigation">
		<div class="admin_icon">	
			<a href="">
					<i class="fas fa-user-cog"></i>
				<span class="admin_Text" >Admin</span>
			</a>
		</div>	
			<ul>
				<li>
					<a href="admin.php" class= "dactive">
						<span class="icon">	
							<i class="fas fa-columns"></i>
						</span>
						<span class="title">Dashboard</span>
					</a>
				</li>	
				<li>
					<a href="elections.php">
						<span class="icon">	
							<i class="fas fa-poll"></i>
						</span>
						<span class="title">Election</span>
					</a>
				</li>
				<li>
					<a href="applicants.php">
						<span class="icon">	
							<i class="far fa-sticky-note"></i>
						</span>
						<span class="title">Applicants</span>
					</a>
				</li>
				<li>
					<a href="users.php">
						<span class="icon">	
							<i class="fas fa-users"></i>
						</span>
						<span class="title">Users</span>
					</a>
				</li>
				<li>
					<a href="/project/php/logout.php">
						<span class="icon">	
							<i class="fas fa-sign-out-alt"></i>

						</span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="main">
			<!-- Topbar containing navigation icon and admin image -->
			<div class="topbar">
				<div class="toggle" onclick="minimise()">				
				</div>
				<div class="user">
					<a href="adminacc.php"><img src="images/admin_photo.png"></a>
				</div>
			</div>
			<div class="candidate_Profile">
				<div class="candidate">
					<div class="c_Heading">
						<span>Candidate Profile</span>
						<a href="applicants.php"><i class="fas fa-arrow-left"></i></a>
					</div>
					<span class="error"><?php 
												if(isset($_SESSION["result_msg"]))
													echo $_SESSION['result_msg'];
													$_SESSION['result_msg'] = "";
											?>
												
						</span>
					<form action="php/cand.php?appid=<?php echo $appid; ?>&uid=<?php echo $uid; ?>" method = "POST">`
					<div class="c_details">
						<div>
							<label>Name:</label>
							<input type="text" class="c_Name" value="<?php echo $name; ?>" readonly>	
						</div>
						<div>
							<label>Attendance:</label>
							<input type="text" class="c_Attendance" value="<?php echo $att."%"; ?>" readonly>
						</div>
						<div>
							<label>Department:</label>
							<input type="text" class="c_Dept" value="<?php echo $dept; ?>" readonly>
						</div>
						<div>
							<label>Year:</label>
							<input type="text" class="c_Year" value="<?php echo $yr; ?>" readonly>
						</div>
						<div>
							<label>Description:</label>
							<textarea rows="4" cols="30" class="c_Desc" readonly > <?php echo $desp; ?>
							</textarea>	
						</div>
					</div>
					
					<div class="buttons">
						<input type="submit" name="decline" value="Decline" class="c_btn decline">
						<input type="submit" name="accept" value="Accept" class="c_btn accept">
					</div>
					</form>
				</div>	
				</div>
			</div>
		</div>
	</div>

</body>
</html>

