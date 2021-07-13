const inputs = document.querySelectorAll(".input");

function add(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function rem(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

inputs.forEach(input => {
	input.addEventListener("focus", add);
	input.addEventListener("blur", rem);
});