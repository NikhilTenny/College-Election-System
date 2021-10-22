<?php
	include("php/config.php");
	include("php/onTablefunc.php");
	include('php/elecheck.php');
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
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src = "js/panel.js" type="text/javascript"></script>
	<script src = "js/onTablefunc.js" type="text/javascript"></script>
</head> 
<body onload="statuscolor()">
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
					<a href="adminacc.php"><img src="images/admin_photo.png"></a>
				</div>
			</div>

			<div class="tables">
				<div class="election">
					<div class="table_Header">
						<h2>Elections</h2>
						<a href="elections.php" class='btn'>View All</a>
					</div>
					<table class="election_Table">
						<thead>
							<tr>
								<th> Name </th>
								<th>Department</th>
								<th>Year</th>
								<th>Voters</th>
								<th>Status</th>
							</tr>	
						</thead>
						<tbody>
						<?php 
								$eQ = "select * from elections order by id DESC limit 7;";
								$eQ_ob = mysql_query($eQ,$con);
								while($eData = mysql_fetch_array($eQ_ob)) {
									$department = getDepartment($eData['Department_id'],$con);
									$year = getYear($eData['Year_id'],$con);
						?>
							<tr>
							<td><?php echo $eData['Name'];?></td>
							<td><?php echo $department; ?></td>
							<td><?php echo $year;?></td>
							<td><?php echo $eData['Voters'];?></td>
							<td class="status"><span class="<?php if($eData['Election_status'] == 0)
										echo 'Declared';
									  elseif ($eData['Election_status'] == 1) 
									  	echo "Ongoing";
									  else 
									  	echo "Finished";	?>"><?php if($eData['Election_status'] == 0)
										echo 'Declared';
									  elseif ($eData['Election_status'] == 1) 
									  	echo "Ongoing";
									  else 
									  	echo "Finished";	?></span></td>
									  
							</tr>

							  
						<?php 
							}
							?>	

					</table>
				</div>
				<div class="student">
					<div class="table_Header">
						<h2>Students</h2>
						<a href="users.php" class='btn'>View All</a>
					</div>
					<table class="user_Table">
						<tbody>
							<?php
								$q = "select * from users order by id DESC limit 8;";
								$u_Result = mysql_query($q,$con);
								while($data = mysql_fetch_array($u_Result)) {
									
									$department = getDepartment($data['Department_id'],$con);
							?>		
									<tr>
										<td><div class="user_Default_img"><img src="images/student_img.png"></div></td>
										<td><h4><?php 
											echo $data['First_name']." ".$data['Last_name'];
												?></h4><span><?php echo $department; ?></span></td>
							<?php					
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>