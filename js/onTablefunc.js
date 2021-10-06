function statuscolor() {
	let st = document.querySelector(".status");
	if(st.innerHTML == "Declared") {
		st.classList.toggle("Declared");
	}
}