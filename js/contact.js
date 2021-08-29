let form = document.getElementById("form_contact");
let nname = document.getElementById("name");
let email = document.getElementById("email");
let phone = document.getElementById("fone");
let subject = document.getElementById("subject");
let msg = document.getElementById("msg");

form.addEventListener('submit', submitForm);
nname.addEventListener('blur', validateName);
email.addEventListener('blur', validateEmail);
phone.addEventListener('blur', validatePhone);
subject.addEventListener('blur', validateSubject);
msg.addEventListener('blur', validateMsg);
msg.addEventListener('keyup', countMsg);


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
        div.innerHTML = "Fill the phone correctly!";
        div.classList.add("error_form");
        return false;
    }
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateSubject(){
    let div = document.getElementById("error_subject");
    if(subject.selectedIndex == 0){
        div.innerHTML = "Select the subject!"; 
        div.classList.add("error_form");
        return false;
    } 
    else{
        div.innerHTML = "";
        div.classList.remove("error_form");
        return true;
    }
}

function validateMsg(){
    let div = document.getElementById("error_msg");
    if(msg.value == ""){
        div.innerHTML = "The message cannot be empty!"; 
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
    if(!(validateName() && validateEmail() && validatePhone() && validateSubject() && validateMsg())){
        event.preventDefault();
    }
    else{
        alert("Data OK to send to back-end!");
    }
}

function countMsg(){
    if(msg.textLength > 300){
        msg.value = msg.value.substring(0, msg.value.length-1);
    }
    document.getElementById("count").innerHTML = msg.textLength + "/300";
} 