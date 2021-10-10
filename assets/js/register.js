let form = document.getElementById("form_register");
let nname = document.getElementById("name");
let email = document.getElementById("email");
let phone = document.getElementById("fone");
let db = document.getElementById("db");
let pass1 = document.getElementById("password1");
let pass2 = document.getElementById("password2");
let state = document.getElementById("state");
let city = document.getElementById("city");
let address = document.getElementById("aaddress");
let district = document.getElementById("district");
let comments = document.getElementById("comments");

form.addEventListener('submit', submitForm);
nname.addEventListener('blur', validateName);
email.addEventListener('blur', validateEmail);
phone.addEventListener('blur', validatePhone);
db.addEventListener('blur', validateBirthDate);
pass1.addEventListener('blur', validatePassword1);
pass2.addEventListener('blur', validatePassword2);
state.addEventListener('blur', validateState);
city.addEventListener('blur', validateCity);
address.addEventListener('blur', validateAddress);
district.addEventListener('blur', validateDistrict);
comments.addEventListener('keyup', countComments);


function validateName(){
    let div = document.getElementById("error_name");
    nname.value = nname.value.trim();
    if(nname.value == "" || nname.value.split(" ").length < 2){
        div.innerHTML = "Fill in the full name!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateEmail(){
    let div = document.getElementById("error_email");
    email.value = email.value.trim();
    if(email.value == "" || email.value.indexOf("@") == -1){
        div.innerHTML = "Fill in the email correctly!"; 
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validatePhone(){
    let div = document.getElementById("error_phone");
    let expr = /(\(?\d{2}\)?\s)?(\d{4,5}\-?\d{4})/;
    console.log(expr.test(phone.value));
    if(!expr.test(phone.value)){
        div.innerHTML = "Fill in the phone correctly!";
        div.classList.add("error_form");
        return false;
    }
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}
 
function validateBirthDate(){
    let div = document.getElementById("error_db");
    if(db.value == ""){
        div.innerHTML = "Fill in the birth date correctly!";
        div.classList.add("error_form");
        return false;
    }
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validatePassword1(){
    let div = document.getElementById("error_password1");
    if(pass1.value == "" || pass1.length < 6){
        div.innerHTML = "Fill in the password field with at least 6 characters!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validatePassword2(){
    let div = document.getElementById("error_password2");
    if(pass2.value == "" || pass2.length < 6){
        div.innerHTML = "Fill in the field confirm password with at least 6 characters!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validatePassword(){
    if(pass1.value != pass2.value){
		alert('Different passwords!');
		userform.field_password1.focus();
		return false;
	}
	else if(pass1.value == pass2.value){
		return true;
	}
}

function validateState(){
    let div = document.getElementById("error_state");
    if(state.value == ""){
        div.innerHTML = "Fill in the state!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateCity(){
    let div = document.getElementById("error_city");
    if(city.value == ""){
        div.innerHTML = "Fill in the city!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateAddress(){
    let div = document.getElementById("error_address");
    if(address.value == ""){
        div.innerHTML = "Fill in the address!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateDistrict(){
    let div = document.getElementById("error_district");
    if(district.value == ""){
        div.innerHTML = "Fill in the district!";
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function submitForm(event){
    if(!(validateName() && validateEmail() && validatePhone() && validateBirthDate() && validatePassword1() && validatePassword2() && validatePassword() && validateState() && validateCity() && validateAddress() && validateDistrict())){
        event.preventDefault();
    }
    else{
        alert("Data OK to send to back-end!");
    }
}

function countComments(){
    if(comments.textLength > 300){
        comments.value = comments.value.substring(0, comments.value.length-1);
    }
    document.getElementById("count").innerHTML = comments.textLength + "/300";
} 