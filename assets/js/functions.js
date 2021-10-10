function showMenu(){
    menu = document.getElementsByTagName("nav")[0];
    if(menu.style.display == "block")
        menu.style.display = "none";
    else
        menu.style.display = "block";   
}

function closeHelp(){
    document.getElementById("doubts").style.display = "none";
}

function minHelp(){
    let div = document.getElementById("doubts");
    div.style.height = "35px";
    let text = document.getElementById("text");
    text.innerHTML = "Doubts?";
}

function maxHelp(){
    let div = document.getElementById("doubts");
    div.style.height = "130px";
    let text = document.getElementById("text");
    text.innerHTML = "Doubts? <br><br> Speak with our attendants.";
}

function validatePassword() {
	var pass1 = registerform.field_password1.value;
	var pass2 = registerform.field_password2.value;

	if(pass1 == "" || pass1.length < 6){
		alert('Fill in the password field with at least 6 characters.');
		userform.field_password1.focus();
		return false;
	}
	if(pass2 == "" || pass2.length < 6){
		alert('Fill in the field confirm password with at least 6 characters.');
		userform.field_password2.focus();
		return false;
	}
	if(pass1 != pass2){
		alert('Different passwords!');
		userform.field_password2.focus();
		return false;
	}
	else if(pass1 == pass2){
		return true;
	}
}