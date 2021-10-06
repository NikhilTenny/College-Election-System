<?php
	include("php/config.php");
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
	$id = $_SESSION['ad_Id'];
	$qur = "select * from admin where (id = $id);";
	if(!mysql_query($qur,$con)) {
		die(mysql_error());
	}
	else {
		$result = mysql_query($qur,$con);
			$admin_Data = mysql_fetch_array($result);
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
	<link rel="stylesheet" type="text/css" href="css/adminacc.css">
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
					<a href="admin.php" >
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
			<div class= "profile_Area">
				<div class="p_Heading"><h2>Admin Profile</h2></div>
				<div class="passError"><?php if(isset($_GET['admsg'])){
											echo $_GET['admsg'];
											echo $_GET['admsg'] = "";
											}
										?></div>
				<form action="php/acc.php" method="POST">
					<div  class="form_Area">
						<div class="profile_details">
							<label>First Name</label>
							<input type="text" name="Fname" 
							placeholder="<?php if(isset($admin_Data['First_name'])) {
								echo $admin_Data['First_name']; }
								else {
									echo "";} ?>" >
						</div>
						<div class="profile_details">
							<label>Last Name</label>
							<input type="text" name="Lname" 
							placeholder="<?php if(isset($admin_Data['Last_name'])) {
								echo $admin_Data['Last_name'];}
								else {
									echo "";} ?>" >
						</div>
						<div class="profile_details">
							<label>Current Password</label>
							<input type="password" name="Pre_pass" >
						</div>
						<div class="profile_details">
							<label>New Password</label>
							<input type="password" name="New_pass" >
						</div>	
						<div class="profile_details">		
							<input type="submit" name="btn" value="SAVE">
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>

</body>
</html>

