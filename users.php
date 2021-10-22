<?php 
	include('php/config.php'); 
	include('php/onTablefunc.php');
	include('php/elecheck.php');	
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
	include('php/elecheck.php');
?>

 <!DOCTYPE html> 
<html>
<head> 
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/panel.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<script src = "js/panel.js" type="text/javascript"></script>
	<script type="text/javascript" src = "js/jquery.js"></script>
	<script type="text/javascript" src = "js/onTablefunc.js"></script>
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

			<div class="tables_Area">
				<div class="t_Heading">
					<h2>Students</h2>
					<table id="user_Table" class="table Users" >
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Department</th>
								<th>Year</th>
								<th>Gender</th>
								<th>Email</th>
								<th></th>		
							</tr>
						</thead>
						<tbody>
							<?php 
								$query = "select * from users;";
								$result = mysql_query($query,$con);
								while($data = mysql_fetch_array($result)) {
									$department = getDepartment($data['Department_id'],$con);
									$year = getYear($data['Year_id'],$con);
							?>
								<tr>
									<td><?php echo $data['First_name'] ?></td>
									<td><?php echo $data['Last_name'] ?></td>
									<td><?php echo $department ?></td>
									<td><?php echo $year ?></td>
									<td><?php echo $data['Gender'] ?></td>
									<td><?php echo $data['Email'] ?></td>

									<td><a href="php/onTablefunc.php?id=<?php echo $data['id']; ?>"onclick="return confirm('Are you sure you want to delete this item?')"class="button Remove">Remove</a></td>
								</tr>
							<?php
								}					 			
							?>
						</tbody>
					</table>
					<script type="text/javascript">
		$(document).ready(function() {
    $('#user_Table').DataTable({
    	'columnDefs': [{
    		'targets':6,
    		'orderable':false,
    	}]
    });
} );	
</script>		
				</div>
			</div>
					
		</div>
	</div>

</body>
</html>