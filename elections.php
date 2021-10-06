<?php 
	include('php/config.php'); 
	include('php/onTablefunc.php');
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}

	// Return the number of elections of specified status
	function get_no_of_election($type,$con){
		$Q = "select * from elections where Election_status = '$type'";
		$Qobj = mysql_query($Q,$con);
		return mysql_num_rows($Qobj);
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
	<link rel="stylesheet" href="css/electionmag.css">
	<script src = "js/panel.js" type="text/javascript"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<!-- DataTable files -->
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"> 
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
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
					<a href="adminacc.php"><img src="images/admin_photo.png"></a>
				</div>
			</div>
			<div class="election_Management">
				<div class="easy_Details">
					<div class="boxarea ongoing">
						<div class="boxdetails ongoing">
							<span class="number ongoing"><?php if(get_no_of_election(1,$con))
																	echo get_no_of_election(1,$con);
																	else 
																	echo "0";	
																?></span>
							<span class="name">Ongoing Election</span>
						</div>
						<i class="fas fa-person-booth"></i>
						
					</div>
					<div class="create_Button">
						<a class="start_Election" href="createElection.php"> Create Election</a>
					</div>
					<div class="boxarea declared">
						<div class="boxdetails declared">
								<span class="number declared"><?php if(get_no_of_election(0,$con))
																	echo get_no_of_election(0,$con);
																	else 
																	echo "0";	
																?></span>
								<span class="name">Declared Election</span>
						</div>
						<i class="fas fa-poll-h"></i>
					</div>
				</div>
				<!-- Table with list of elections -->
				<div class="table_Area">
					<div class="t_Heading">
						<h2>Elections</h2>
					</div>
					<table id="elections_Table" class="table elections">
					<thead>
						<tr>
							<th>Name</th>
							<th>Department</th>
							<th>Year</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Voters</th>
							<th>Status</th>
						
						</tr>
					</thead>
					<tbody>
						<?php 
						$selectQ = "select * from elections;";
						$result = mysql_query($selectQ,$con);
						while($data = mysql_fetch_array($result)){
							$department = getDepartment($data['Department_id'],$con);
							$year = getYear($data['Year_id'],$con);
							?>
							<tr>
								<td><?php echo $data['Name']; ?></td>
								<td><?php echo $department; ?></td>
								<td><?php echo $year; ?></td>
								<td><?php echo $data['Start_date']; ?></td>
								<td><?php echo $data['End_date']; ?></td>
								<td><?php echo $data['Name']; ?></td>
								<td><a class="button View">View</a></td>
							</tr>	
						<?php
						}
						?>
					</tbody>
					</table>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#elections_Table').DataTable({
								'columnDefs': [{
					    		'targets':6,
					    		'orderable':false,
					    	}]
					    });
						});
					</script>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<td><a class="button View">View</a></td>