<?php
include 'config.php';
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['Eid'];
$gender = $_POST['Gender'];
$dept = $_POST['Department'];
$yr = $_POST['Year'];
$pswd = $_POST['Password'];
$pswdre = $_POST['Passwordre'];

// Check if the an account is already in the database
function user_exist_check($email,$con) {
	$emailQ = "select Email from users where (Email = '$email');";
	$email = mysql_query($emailQ);
	if(mysql_num_rows($email) > 0) {
		return True;
	}
	else {
		return False;
	}
}

// Return the  yearid 
function getyrid($year,$con) {
	$getyr = mysql_query("select id from year where (Year_name = '$year')",$con);
	$yrid = mysql_fetch_array($getyr);
	return $yrid[0]; 
}

// Return the department id
function getdeptid($dept,$con) {
	$getdept = mysql_query("select id from department where (Department_name = '$dept')",$con);
	$deptid = mysql_fetch_array($getdept);
	return $deptid[0];
}

// Return id of user
function getid($email,$con) {
	$idQ = mysql_query("select id from users where (Email = '$email');",$con);
	$id = mysql_fetch_array($idQ);
	return $id[0];
}

// Insert user_id and password to user_login table
function log_table_insert($id,$con,$pswd) {
	$inQ = "insert into user_login (id,Password) values ('$id','$pswd');";
	mysql_query($inQ,$con) ;
}

if($_POST["subbtn"] == "SIGN UP") {
	if(user_exist_check($email,$con) == False) {
		$yrid = getyrid($yr,$con);
		$deptid = getdeptid($dept,$con);

		$signupquery = "insert into users (Email,First_name,Last_name,Gender,Department_id,Year_id) values
										  ('$email','$fname','$lname','$gender',$deptid,$yrid);"; 
		mysql_query($signupquery,$con); 								  
		$id = getid($email,$con);
		log_table_insert($id,$con,$pswd);
		if(isset($_SESSION['data'])) {	
			unset($_SESSION['data']);
		}	
	}
	else {
		//if username already exists 
		$data['Fname'] = $_POST['Fname'];
		$data['Lname'] = $_POST['Lname'];
		$data['Eid'] = $_POST['Eid'];
		$data['Gender'] = $_POST['Gender'];
		$data['Department'] = $_POST['Department'];
		$data['Year'] = $_POST['Year'];
		$data['s_message']="Email address already exist";
		$data['window'] = "signup";
		session_start();
		$_SESSION['data'] = $data; 
		header("Location:/project/index.php");

}
}
?>