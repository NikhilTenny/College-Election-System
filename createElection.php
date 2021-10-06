<?php 
	include('php/config.php'); 
	include('php/onTablefunc.php');
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/panel.css">
	<link rel="stylesheet" type="text/css" href="css/createElection.css">
	<script src = "js/panel.js" type="text/javascript"></script>
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
					<a href="admin.php">
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
					<a href="adminacc.html"><img src="images/admin_photo.png"></a>
				</div>
			</div>
			<!-- Election Details input area  -->
			<div class="input_area">

				<form action="php/createE.php" method="POST">
				<div class="form_Area">
					<span>Create Election</span>
					<span class="error"><?php 
										if(isset($_GET["cr_Reply"]))
											echo $_GET['cr_Reply'];
											$_GET['cr_Reply'] = "";

												 ?></span>
					<div class="election_Name">
						<label>Election Name:</label>
						<input type="text" name="election_Name" placeholder="">
					</div>
					<div class="dropDown">
						<select name="Department">
							<option disabled selected>Department</option>
							<option value="BCA">BCA</option>
							<option value="MCA">MCA</option>
							<option value="Bcom">Bcom</option>
							<option value="Mcom">Mcom</option>
						</select>	
						<select name="year">
							<option disabled selected>Year</option>
							<option value="First">First</option>
							<option value="Second">Second</option>
							<option value="Third">Third</option>
						</select>			
					</div>
					<div class="datetime start">
						<div class="start date ">
							<label>Start Date:</label>
							<input type="date" name="start_Date">
						</div>
						<div class="start time ">
							<label>Start Time:</label>
							<input type="time" name="start_Time">
						</div>
					</div>
					<div class="datetime end">
						<div class="end date">
							<label>End Date:</label>
							<input type="date" name="end_Date">
						</div>
						<div class="end time">
							<label>End Time:</label>
							<input type="time" name="end_Time">
						</div>
					</div>
					<input type="submit" name="btn" value="Create">

					
				</div>
				</form>
				
			</div>
			
		</div>
	</div>
</body>
</html>