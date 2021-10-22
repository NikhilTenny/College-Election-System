<?php
	include("php/config.php");
	include("php/onTablefunc.php");
	include('php/elecheck.php');
	session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}
	// Incase of any error go back to the previous page
	function errormsg() {
		header("Location:elections.php?msg=Something went wrong!");
	}

	$eid = $_GET['eid'];
	$getQ = "select * from elections where id = '$eid';";
	if(!($getQ_obj = mysql_query($getQ,$con))) 
		errormsg();
	else {
		$eData = mysql_fetch_array($getQ_obj);
	}

	$dpt = getDepartment($eData['Department_id'],$con);
	$yr = getYear($eData['Year_id'],$con);
	$votersNo = get_No_of_voters($eid,$con);  
	if($votersNo < 0) 
		errormsg();
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
						<span class="error"></span>
						<a href="elections.php"><i class="fas fa-arrow-left"></i></a>
					</div>
					<div class="details_area">
						<div class="eName">
							<label>Name:</label>
							<span><?php echo $eData['Name']; ?></span>
						</div>
						<div class="eDepartment">
							<label>Department:</label>
							<span><?php echo $dpt; ?></span>
						</div>
						<div class="eYear">
							<label>Year:</label>
							<span><?php echo $yr; ?></span>
						</div>
						<div class="voters">
							<label>Voters:</label>
							<span><?php echo $votersNo; ?></span>
						</div>
						<div class="start">
							<div class="start_date">
								<label>Start Date:</label>
								<span><?php echo $eData['Start_date']; ?></span>
							</div>
							<div class="start_time">
								<label>Start Time:</label>
								<span><?php echo $eData['Start_time']; ?></span>
							</div>
						</div>
						<div class="end">
							<div class="end_date">
								<label>End Date:</label>
								<span><?php echo $eData['End_date']; ?></span>
							</div>
							<div class="end_time">
								<label>End Time:</label>
								<span><?php echo $eData['End_time']; ?></span>
							</div>
						</div>
						<div class="cancel">
							<a href="php/onTablefunc.php?election_Id=<?php echo $eid; ?>"onclick="return confirm('Are you sure you want to cancel this election?')">Cancel Election</a>
						</div>
					</div>
				</div>
			</div>
				<div class="tables_Area">
					<div class="t_Heading" style="display:block;">
						<h2>Voters List</h2>
						<table id="voters_Table" class="table Voters">
							<thead>
								<tr>
									<th>First name</th>
									<th>Last name</th>
									<th>Gender</th>	
									<th>Vote Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$vot_ob = mysql_query("select * from voters_list where Election_id = '$eid';",$con);
									if(!$vot_ob)
										errormsg();
															
									while($data = mysql_fetch_array($vot_ob)) {
										$stuData = getStuData($data['User_id'],$con);
								?>
								<tr>
									<td><?php echo $stuData['First_name']; ?></td>
									<td><?php echo $stuData['Last_name']; ?></td>
									<td><?php echo $stuData['Gender']; ?></td>
									<td><?php if($data['Vote_status'] == 1)
													echo "Yes";
											  else if($data['Vote_status'] == 0)
											        echo "No"; ?></td>
								</tr>
								<?php 
									}
								?>					
							</tbody>
						</table>
					</div>
				</div>		
		<script type="text/javascript">
		$(document).ready( function () {
    $('#voters_Table').DataTable({
    	'columnDefs': [{
    		'targets':3,
    		'orderable':false,
    	}]
    });
});	
</script>						
		</div>
	</div>

</body>
</html>