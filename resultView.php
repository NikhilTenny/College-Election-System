 <?php 
include("php/config.php");
$_GET['from'] = 'result';
include("php/resultcheck.php");


if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
}
$id = $_SESSION['stu_Id'];
$dpid =$_SESSION['stu_dpid'];
$yrid = $_SESSION['stu_yrid'];

//Retrive the name of the student who is logged in 
$stuname = getFullName($id,$con);

$getQ = "select * from elections where Department_id = $dpid and Year_id = $yrid and Election_status = 2 order by id DESC";
$getQob = mysql_query($getQ,$con);
$eedata = mysql_fetch_array($getQob);
$eid = $eedata['id'];








$getQ = "select * from candidate where Elections_id = $eid order by Votes DESC";
$getob = mysql_query($getQ,$con);
while($cand_data = mysql_fetch_array($getob)) {
			if(isset($m_win_id) and isset($f_win_id)) { #if we got both winner break the loop
				break;
			}
			$cand_uid = $cand_data['User_id'];
			$studata = getStuData($cand_uid,$con); #Get the winnner student details
			if(!isset($m_win_uid)) { #Until the male winner id hasn't retrived		
				if($studata['Gender'] == 'Male') { 
					#store the winner details
					$m_win_cid = $cand_data['id'];  
					$m_win_uid = $studata['id'];
					$m_win_name = getFullName($m_win_uid,$con);
					$m_votes = $cand_data['Votes'];
					continue;
				}
			}		
			if(!isset($f_win_uid)) { #Until the female winner id hasn't retrived
				if($studata['Gender'] == 'Female') {
					$f_win_cid = $cand_data['id'];
					$f_win_uid = $studata['id'];
					$f_win_name = getFullName($f_win_uid,$con);
					$f_votes = $cand_data['Votes'];
					continue;
				}
			}
		}


 
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
	<link rel="stylesheet" type="text/css" href="css/result.css">
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
						<a href=""><button class="btn result" style="background:#778ca3; color:white;">Result</button>
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
				<div class="e_name"><span > WINNERS!</span> </div>
				<div class="winners">
					<div class="card">
					    <img src="images/mCand.png" alt="User image" class="card__image" />
					    <div class="card__text">
					      <h2><?php echo $m_win_name; ?></h2>

					    </div>
					    <ul class="card__info">
					      <li>
					        <span class="card__info__stats"><?php echo $m_votes; ?></span>
					        <span>VOTES</span>
					      </li>
					    </ul>   
	  				</div>
					<div class="card">
					    <img src="images/fCand.png" alt="User image" class="card__image" />
					    <div class="card__text">
					      <h2><?php echo $f_win_name; ?></h2>

					    </div>
					    <ul class="card__info">
					      <li>
					        <span class="card__info__stats"><?php echo $f_votes; ?></span>
					        <span>VOTES</span>
					      </li>
					    </ul>   
	  				</div>
  				</div>
  				<div class="result_table">
  					<div class="table_heading"> All Candidates</div>
  					<div class="t_area">
	  					<table>
	  						<thead>
	  							<tr >
	  								<th colspan = 2> Name </th>
	  								<th>Votes</th>
	  							</tr>
	  						</thead>	
							<tbody>
								<?php
								$Q= "Select * from candidate where Elections_id = $eid;";
								$Qob = mysql_query($Q,$con);
								if(!$Qob)
									die(mysql_error());								
								while($data = mysql_fetch_array($Qob)) {
									$stud = getStuData($data['User_id'],$con);
									$name = $stud['First_name']." ".$stud["Last_name"]; 
								?>
								<tr>
									<td class="cand_img"><img src="images/candidate.png"></td>
									<td class="cand_Name"><?php echo $name; ?></td>
									<td class="cand_Name"><?php echo $data['Votes']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
  					</div>
  				</div>

			</div>
		</div>
	</div>
</body>
</html>