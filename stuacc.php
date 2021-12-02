<?php 
include("php/config.php");
include("php/onTablefunc.php");
session_start();
$id = $_SESSION['stu_Id'];
$Qre = mysql_query("select * from users where id = $id",$con);
// Storing the details of the student
while($data = mysql_fetch_array($Qre)){
	$F_name = $data['First_name'];
	$L_name = $data['Last_name'];
	$dpname = getDepartment($data['Department_id'],$con);
	$yrname = getYear($data['Year_id'],$con);
	$gender = $data['Gender'];
	$phno = $data['Phone_no'];
	$email =$data['Email'];
	$stuname = $data['First_name']." ".$data['Last_name'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/userpanel.css">
	<link rel="stylesheet" type="text/css" href="css/stuacc.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">

</head>
<body>
	<div class="main_container">
		<div class="topbar">
			<a href="php/stulogin.php"><img src="images/voteicon.png"></a>
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
			<form>
			<div class="profile">
				<div class="details">
					<div class="stu_Img"></div>
					<div>
						<input type="text" name="f_Name" placeholder="<?php echo $F_name; ?>">
					</div>
					<div>
						<input type="text" name="l_Name" placeholder="<?php echo $L_name; ?>">
					</div>
					<div class="drop-area">
						<select name="Gender">
							<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
	
						</select>
						<select class="dept-drop" name="Department">
							<option value="<?php echo $dpname; ?>"><?php echo $dpname; ?></option>
						</select>
						<select class="year-drop" name="Year">
							<option value="<?php echo $yrname; ?>"><?php echo $yrname; ?></option>
						</select>
					</div>
					<div>
						<input type="text" name="p_No" placeholder="<?php echo $phno; ?>">
					</div>
					<div>
						<input type="text" name="email" placeholder="<?php echo $email; ?>">
					</div>
					<div class="options">
						<a class="edit" href="stuedit.php">Edit</a>
						<a class="c_Pass" href="stupass.php">Change Password</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</body>
</html>