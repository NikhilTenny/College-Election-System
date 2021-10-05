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
					<a href="elections.html">
						<span class="icon">	
							<i class="fas fa-poll"></i>
						</span>
						<span class="title">Election</span>
					</a>
				</li>
				<li>
					<a href="applicants.html">
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
			<div class="election_Management">
				<div class="easy_Details">
					<div class="boxarea ongoing">
						<div class="boxdetails ongoing">
							<span class="number ongoing">12</span>
							<span class="name">Ongoing Election</span>
						</div>
						<i class="fas fa-person-booth"></i>
						
					</div>
					<div class="create_Button">
						<a class="start_Election" href="createElection.php"> Create Election</a>
					</div>
					<div class="boxarea declared">
						<div class="boxdetails declared">
								<span class="number declared">12</span>
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
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>dfdf</td>
							<td>dfa</td>
							<td>d</td>
							<td>df</td>
							<td>df</td>
							<td>df</td>
							<td>df</td>
							<td><a class="button View">View</a></td>
						</tr>
					</tbody>
					</table>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#elections_Table').DataTable({
								'columnDefs': [{
					    		'targets':4,
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