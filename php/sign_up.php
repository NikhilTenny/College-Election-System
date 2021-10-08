<?php
include 'config.php';
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['Eid'];
$gender = $_POST['Gender'];
$dept = $_POST['Department'];
$yr = $_POST['Year'];
$Pno = $_POST['Pno'];
$pswd = $_POST['Password'];
$pswdre = $_POST['Passwordre'];
echo $Pno;



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
	if(!mysql_query("select id from year where (Year_name = '$year')",$con)) {
		$flag = 1;
		return 0;
	}
	$yrid = mysql_fetch_array($getyr);
	return $yrid[0]; 
}

// Return the department id
function getdeptid($dept,$con) {
	$getdept = mysql_query("select id from department where (Department_name = '$dept')",$con);
	if(! mysql_query("select id from department where (Department_name = '$dept')",$con)) {
		$flag = 1;
		return 0;
	}
	$deptid = mysql_fetch_array($getdept);
	return $deptid['id'];
}

// Return id of user
function getid($email,$con) {
	$idQ = mysql_query("select id from users where (Email = '$email');",$con);
	if(!mysql_query("select id from users where (Email = '$email');",$con)) {
		$flag = 1;
		return 0;
	}
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
		if(($yrid != 0)and ($deptid != 0)){
			$signupquery = "insert into users (Email,First_name,Last_name,Gender,Department_id,Year_id,Phone_no) values
											  ('$email','$fname','$lname','$gender','$deptid','$yrid','$Pno');"; 
			mysql_query($signupquery,$con); 								  
			$id = getid($email,$con);
			log_table_insert($id,$con,$pswd);
			session_start();
			$_SESSION['data']['window'] = "users";
			header("Location:/project/index.php");
		}
		else {
			session_start();
			$_SESSION['data']['window'] = "signup";
			$_SESSION['data']['s_message'] = "An error occured";
			header("Location:/project/index.php");
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