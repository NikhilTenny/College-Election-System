<?php
	include("php/config.php");
	include("php/onTablefunc.php");
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
	$eid = $_SESSION['ele_id'];
	echo $eid;
	$getQ = "select * from elections where id = '$eid';";

?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title></title> 
	<script type="text/javascript" src = "js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/panel.css">
	<link rel="stylesheet" type="text/css" href="css/electionView.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<script src = "js/panel.js" type="text/javascript"></script>
	
	<!-- DataTable files -->
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
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
			<div class="election_detail_Area">
				<div class="elction_text_detail">
					<div class="top">
						<span class="heading">Details</span>
						<a href="elections.php"><i class="fas fa-arrow-left"></i></a>
					</div>
					<div class="details_area">
						<div class="eName">
							<label>Name:</label>
							<span>Main Election</span>
						</div>
						<div class="eDepartment">
							<label>Department:</label>
							<span>BCA</span>
						</div>
						<div class="eYear">
							<label>Year:</label>
							<span>First</span>
						</div>
						<div class="voters">
							<label>Voters:</label>
							<span>34</span>
						</div>
						<div class="start">
							<div class="start_date">
								<label>Start Date:</label>
								<span>2001-2-3</span>
							</div>
							<div class="start_time">
								<label>Start Time:</label>
								<span>12:43:3</span>
							</div>
						</div>
						<div class="end">
							<div class="end_date">
								<label>End Date:</label>
								<span>2001-2-3</span>
							</div>
							<div class="end_time">
								<label>End Time:</label>
								<span>12:43:3</span>
							</div>
						</div>
						<div class="cancel">
							<a href="">Cancel Election</a>
						</div>
					</div>
				</div>
			</div>
				<div class="tables_Area">
					<div class="t_Heading" style="display:block;">
						<h2>Candidate Applicants</h2>
						<table id="applicants_Table" class="table Candidates">
							<thead>
								<tr>
									<th>Name</th>
									<th>Department</th>
									<th>Year</th>	
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Suresh</td>
									<td>MCA</td>
									<td>Second</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
		<script type="text/javascript">
		$(document).ready( function () {
    $('#applicants_Table').DataTable({
    	'columnDefs': [{
    		'targets':2,
    		'orderable':false,
    	}]
    });
});	
</script>						
		</div>
	</div>

</body>
</html>