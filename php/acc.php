<?php 
include('config.php');
session_start();
	if(!isset($_SESSION['ad_Uname'])) {
		header("Location:/project/index.php");
	}

function getAdminpass($id,$con) {
	$passQ = "select Password from admin_login where id = '$id';";
		if(!mysql_query($passQ,$con)) 
			return 0;
		else {
			$result = mysql_query($passQ,$con);
			$resultData = mysql_fetch_array($result);
			return $resultData['Password'];
		}
}

function setAdminpass($newpass,$ac_id,$con) {
	$changepassQ = "update admin_login set Password = '$newpass' where id = '$ac_id';";
	mysql_query($changepassQ,$con);
}

if(isset($_POST['btn']) == 'SAVE') {
	$fname = $_POST['Fname'];
	$lname = $_POST['Lname'];
	$prepass = $_POST['Pre_pass'];
	$newpass = $_POST['New_pass'];
	$ac_id = $_SESSION["ad_Id"];

	$qu = "select * from admin where(id = $ac_id);";
	$ad = mysql_query($qu,$con);
	$adprofile = mysql_fetch_array($ad);
	$nameFlag = 0;
	$flag = 0;

	if(($prepass and $newpass) != "") {
		$adprepass = getAdminpass($ac_id,$con);
		if( $prepass == $adprepass) {
			$flag = 1;
			setAdminpass($newpass,$ac_id,$con);
		} 
		else 
			$flag = 2;
	}


	if( $flag != 2) {
		if($fname != "") {
			if($fname != $adprofile['First_name']) {
				$nameFlag = 1;
				$fq = "update admin set First_name = '$fname' where id = $ac_id;";	
				mysql_query($fq,$con);		
			}
		}

		if($lname != "") {
			if($lname != $adprofile['Last_name']) {
				$nameFlag = 1;
				$lq = "update admin set Last_name = '$lname' where id = $ac_id;";
				mysql_query($lq,$con);			
			}
		}
	}

	if($flag == 2) 
		header("Location:/project/adminacc.php?admsg=Incorrect Password");
	else if($nameFlag == 1 and ($flag = 1 or $flag = 0)) 
		header("Location:/project/adminacc.php?admsg=Profile Update Succesfull");
	else 
		header("Location:/project/adminacc.php?");

}
?>