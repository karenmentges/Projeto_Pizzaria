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