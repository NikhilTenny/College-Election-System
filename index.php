
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/landing.css">
	<link rel="stylesheet" type="text/css" href="css/landing_login.css">
	<link rel="stylesheet" type="text/css" href="css/landing_txt-img.css">
	 
</head>

<body>
	<script type="text/javascript" src="js/index.js"></script>


	<!----- Header Part ------->
	
	<section class="header">
	<nav>
		<div class="logo">
			<a href="index.php"><img class="logo-img" src="images/voteicon.png"></a> 
		</div>
		<div class="nav-items">
			<ol>
				<li  id="sign-up-opt" onclick="print_sign_up()" style="display:none;">Sign Up</li>
				<li id="log-in-opt" onclick="print_stu_log()"> Log In </li>
				<li id="admin-opt" onclick="print_ad_log()"> Admin</li>
			</ol>		
		</div>
	</nav>
	</section>

	<!----- Middle Part ---->

		<script type="text/javascript" src="js/index.js">
</script>
			<?php
					session_start();
			$already="";
				if(isset($_SESSION['data']['window']) == "signup") {
					$already = $_SESSION['data']['window'];
				}
				if(isset($_SESSION['data']['window']) == "users") {
					$already = $_SESSION['data']['window'];
				}
				else if(isset($_SESSION['data']['window']) == "admin") {
					$already = $_SESSION['data']['window'];
				}

			?>

	<div class="text-img" id="Front-text-img" >	
			<div class="text-section" id="js_button" >
				<h1 class="main-head">ELECTION CENTER</h1>
				<small class="tag-line">
					Cast Your Choice in a CLICK !
				</small>
				<button id="user-opt" onclick="print_sign_up()">Let's Start</button>
			</div>
			<div class="vote-img" id="vote-img-id">			
			</div>	
		</div>

    <!----- Admin Log in from ------->

    <form action="php/login.php" method="POST" novalidate>
	<div class="Log-Center" id="admin_login_form" style = "display: none;" >
		<img id="login-img" src="images/admin.png">
		<div class="Login-text">LOG IN</div>
		<span id="ad_error_msg" class="error-msg"  >
			<?php 
			if(isset($_SESSION['data']['window'])) {
				if($_SESSION['data']['window'] == 'admin') {
					echo $_SESSION['data']['message'];
				}
			}
			?>
		 </span>
		<div class="Form-area">
			<input type="text" name="Username" placeholder="Username" required>
			<input type="password" name="Psw"  placeholder="Password" required>
		</div>
		<input type="submit" name="adlogin" value="LOGIN">
	</form>	
	</div>
		
	<!----- Student Log in from ------->

	<form action="php/login.php" method="POST" >
	<div class="Log-Center" id="student_login_form" style = "display: none";>
		<img id="login-img" src="images/student.png">
		<div class="Login-text">LOG IN</div>
		<span id="stu_error_msg" class="error-msg">
			<?php 
			if(isset($_SESSION['data']['window'])) {
				if($_SESSION['data']['window'] == 'users') {
					echo $_SESSION['data']['message'];
				}
			}
			?>
	</span>
		<div class="Form-area"> 
			<input type="text" name="Username" placeholder="Username" required>
			<input type="password" name="Psw" placeholder="Password" required>
		</div>
		<input type="submit" name="stulogin" value="LOGIN">
	</form>		
		<p class="last_text">Not Registered? <button type="button" class="in_redirect" onclick="print_sign_up()">Register</button></p>
	</div>
	
	<!------ Sign Up form ------>	
	
	<div class="Sign-up-session" id="Sign-up-main" style="display: none";>
	<form  action="php/sign_up.php" id="sign_up-form"  method = "POST" >		
			<div class = 'Sign-form-area'>
				<h1 class = Sign-text> SIGN UP</h1>
				<span class="error-msg" > <?php echo (isset( $_SESSION['data']['s_message']))? $_SESSION['data']['s_message']:"" ?></span>	
				<input type="text" name="Fname" placeholder="First Name" value="<?php echo (isset($_SESSION ['data']['Fname'])) ? $_SESSION['data']['Fname'] : '' ?>"   required>
				<input type="text" name="Lname" placeholder="Last Name" value="<?php echo (isset($_SESSION['data']['Lname'])) ? $_SESSION['data']['Lname'] : '' ?>" required>
				<input id="sign-uname" type="text" name="Eid" placeholder="Email ID" required>
							
				<div class="Drop-area">
					<select name="Gender" required >
						<option disabled selected >Gender</option>
						<option value = "Male"
						 <?php if (isset($_SESSION['data']['Gender']) && $_SESSION['data']['Gender']=="Male") { echo ' selected="selected"'; } ?> > Male </option>
						<option value = "Female"
						<?php if(isset($_SESSION['data']['Gender']) && $_SESSION['data']['Gender'] == "Female") { echo 'selected = "selected"';} ?>  > Female </option>
					</select>
					<select class="dept-drop" id="dept-drop-down" name="Department" required>
						<option disabled selected>Department</option>
						<option value="BCA" 
						 <?php if(isset($_SESSION['data']['Department']) && $_SESSION['data']['Department'] == "BCA") { echo 'selected = "selected"';} ?>  > BCA </option>
						<option value="MCA"
						<?php if(isset($_SESSION['data']['Department']) && $_SESSION['data']['Department'] == "MCA") { echo 'selected = "selected"';} ?> > MCA </option>
						<option value="Bcom"
						<?php if(isset($_SESSION['data']['Department']) && $_SESSION['data']['Department'] == "Bcom") { echo 'selected = "selected"';} ?> > Bcom </option>
						<option value="Mcom"
						<?php if(isset($_SESSION['data']['Department']) && $_SESSION['data']['Department'] == "Mcom") { echo 'selected = "selected"';} ?> > Mcom </option>
					</select>
					 <select class="year-drop" name="Year" required>
						<option disabled selected>Year</option>
						<option value="First" 
						<?php if(isset($_SESSION['data']['Year']) && $_SESSION['data']['Year'] == "First") { echo 'selected = "selected"';} ?> > First </option>
						<option value="Second"
						<?php if(isset($_SESSION['data']['Year']) && $_SESSION['data']['Year'] == "Second") { echo 'selected = "selected"';} ?> > Second </option>
						<option value="Third"
						<?php if(isset($_SESSION['data']['Year']) && $_SESSION['data']['Year'] == "Third") { echo 'selected = "selected"';} ?> > Third </option>
						</form>
					</select> 
				</div>
				<input id="sign-pass" type="Password" name="Password" placeholder="Password" required>
				<input id="sign-pass_re" type="Password" name="Passwordre" placeholder="Confirm Password" required>
				<input type="submit" name="subbtn" value="SIGN UP">		

				<p class="last_text"> Already registered? 
					<button type="button" class="in_redirect" onclick="print_stu_log()">Login</button></p>
			</div>						
		</div>
		<script type="text/javascript" src="js/index_validation.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {

			    	var already=<?php echo json_encode( $already) ?>;
			    	if(already == "signup"){
			    		print_sign_up();
			    		<?php unset($_SESSION['data']); ?>
			    	}
			    	else if(already == "admin") {
			    		print_ad_log();
			    		<?php unset($_SESSION['data']); ?>
			    	}
			    	else if (already == "users") {
			    		print_stu_log();
			    		<?php unset($_SESSION['data']); ?>
			    	}
			});
		
		</script>
</body>
</html>








