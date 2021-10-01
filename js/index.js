function sign_error() {
	let uname = document.getElementById("sign-uname");
}

// remove everything except logo
function remove_sections() {
	let sign_up = document.getElementById('Sign-up-main');
	let ad_log = document.getElementById('admin_login_form');
	let stu_log = document.getElementById('student_login_form');
	let text_img = document.getElementById('Front-text-img');
	// Remove the style attribute from all the items in nav bar
	// i.e to display it
	try {
	document.getElementById('sign-up-opt').removeAttribute("style");
	document.getElementById('log-in-opt').removeAttribute("style");
	document.getElementById('admin-opt').removeAttribute("style");}
	catch(err) {
	}
	
	if(sign_up.style.display == "block" ) { 
		sign_up.style.display = "none";
	}
	if(ad_log.style.display == "block") {
		ad_log.style.display = "none";
	}
	if(stu_log.style.display == "block") {
		stu_log.style.display = "none";
	}
	if(text_img.style.display != ("block" || "none")) {
		text_img.style.display = "none";
	}
}

/*Display Student login section*/
function print_stu_log() {
	remove_sections();
	document.getElementById('student_login_form').style.display = "block";
	document.getElementById('log-in-opt').style.display = "None";
}

// Display sign up section
function print_sign_up() {
	remove_sections();
	document.getElementById('Sign-up-main').style.display = "block";
	document.getElementById('sign-up-opt').style.display = "None";
}

// Print admin login section
function print_ad_log() {
	remove_sections();
	document.getElementById('admin_login_form').style.display = "block";
	document.getElementById('admin-opt').style.display = "None";

}
