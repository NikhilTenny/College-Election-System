
function play_login(ele) {
	if (ele.id == 'admin-opt')
		document.getElementById('admin-opt').style.display = "none";

	/*Remove text and lets go button */
	if (document.getElementById("js_button").style.display !== "none")
		document.getElementById("js_button").style.display = "none";
	/*Remove sign up section*/
	if (document.getElementById("Sign-up-main").style.display = "block")
		document.getElementById("Sign-up-main").style.display = "none";
	/*Display login section*/
	if (document.getElementById("js_login_section").style.display === "none")
		document.getElementById("js_login_section").style.display = "block";
	/*Display the image*/
	if (document.getElementById("vote-img-id").style.display !== "block")
		document.getElementById("vote-img-id").style.display = "block";
	/* Display the sign up option in nav bar*/
	document.getElementById("sign-up-opt").style.removeProperty("display");	
	}

function play_signup() {
	/*Remove text and lets go button */
	if (document.getElementById("js_button").style.display !== "none")
		document.getElementById("js_button").style.display = "none";
	/*Remove the image*/
	if (document.getElementById("vote-img-id").style.display !== "none")
		document.getElementById("vote-img-id").style.display = "none";
	/*Remove the login section if present*/
	if (document.getElementById("js_login_section").style.display !== "none")
		document.getElementById("js_login_section").style.display = "none";
	
	document.getElementById("Sign-up-main").style.display = "block";
	document.getElementById("sign-up-opt").style.display = "none";


}

