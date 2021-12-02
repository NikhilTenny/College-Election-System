
<?php
include 'config.php';
$uname = $_POST['Username'];
$pswd = $_POST['Psw'];

// Return id 
function getuid($uname,$con,$main_table) {
	$idQ = mysql_query("select id from $main_table where (Email = '$uname');",$con);
	if(mysql_num_rows($idQ)!= 0) {
		$id = mysql_fetch_array($idQ);
		return $id[0];
	}
	else {
		return False;
	}
}

// Check if the username and password is correct
function checklogin($id,$pswd,$con,$login_table) {
	$passQ = mysql_query("select Password from $login_table where(id = '$id');",$con);
	if(mysql_num_rows($passQ) != 0) {
		$pass = mysql_fetch_array($passQ);
	}
	if($pass[0] == $pswd) {
		return True;
	}
	else {
		return False;
	}
}

#check if the data is from admin login form or student login form
if(isset($_POST['stulogin'])) {
	if($_POST['stulogin'] == 'LOGIN') {
	$main_table = "users";
	$login_table = "user_login";
	}
}
else if(isset($_POST['adlogin'])) {
	if($_POST['adlogin'] == 'LOGIN') {
	$main_table = "admin";
	$login_table = "admin_login";
	}
}

// If username or password is wrong
function wrongEntry($main_table,$login_table) {
	$data['Username'] = $_POST['Username'];
	$data['window'] = $main_table;
	$data['message'] = "Incorrect Username or Password";
	session_start();
	$_SESSION['data'] = $data;
	header("Location:/project/index.php"); 

}

// check if the username and password is correct
$id = getuid($uname,$con,$main_table);
if($id != False) {
	if(checklogin($id,$pswd,$con,$login_table) == True) {
		if(isset($_SESSION['data'])) {
			unset($_SESSION['data']);
		}
		session_start();
		$_SESSION['stu_Uname'] = $uname;
		$_SESSION['stu_Id'] = $id;
		header("Location:stulogin.php");
		if($main_table == 'admin') {
			session_start();
			$_SESSION['ad_Uname'] = $uname;
			$_SESSION['ad_Id'] = $id;
			header("Location:/project/admin.php");
		}
	}
	else {	
		wrongEntry($main_table,$login_table);
	}
	}
else {
	wrongEntry($main_table,$login_table);
}


?>