
<?php 
include("php/config.php");
session_start();
if(!isset($_SESSION['stu_Id'])) {
	header("Location:/project/index.php");
}
$id = $_SESSION['stu_Id'];
$Qre = mysql_query("select * from users where id = $id",$con);
while($data = mysql_fetch_array($Qre))
{
	$stuname = $data['First_name']." ".$data['Last_name'];
	$F_name = $data['First_name'];
	$L_name = $data['Last_name'];
	$phno = $data['Phone_no'];
	$email =$data['Email'];
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
			<a class ="acc" href="stuacc
				.php">
					<div class="stu_Info">
						<span><?php echo $stuname; ?></span>
						<img src="images/stuinfo.png">
						<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
					</div>
				</a>
		</div>
		<div class="center_Portion">
			<form action="php/stuupdate.php" method = "POST">
			<div class="profile">
				<div class="details">
					<div class="stu_Img"></div>
					<div>
						<span class="error"><?php 
												if(isset($_SESSION["result_msg"]))
													echo $_SESSION['result_msg'];
													$_SESSION['result_msg'] = "";
											?>
												
						</span>
					</div>
					<div>
						<input type="text" name="f_Name" placeholder="<?php echo $F_name; ?>">
					</div>
					<div>
						<input type="text" name="l_Name" placeholder="<?php echo $L_name; ?>">
					</div>
					
					<div>
						<input type="text" name="p_No" placeholder="<?php echo $phno; ?>">
					</div>
					<div>
						<input type="text" name="email" placeholder="<?php echo $email; ?>">
					</div>
					<input  type="submit" name="update" value="Update">
				</div>
			</div>
			</form>
		</div>
	</div>
</body>
</html>