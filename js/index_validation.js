let password = document.getElementById("sign-pass");
let passwordre = document.getElementById("sign-pass_re");

// check is the password and re entered passwords match
function passcheck() {
	if(password.value != passwordre.value) {
		passwordre.setCustomValidity("Passwords doesn't Match");
	}
	else {
		passwordre.setCustomValidity("");
	}
}

password.onchange = passcheck;
passwordre.onkeyup = passcheck; //On each key up in confirm password field check if both passwords match
