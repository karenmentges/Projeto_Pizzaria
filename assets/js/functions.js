function showMenu(){
    menu = document.getElementsByTagName("nav")[0];
    if(menu.style.display == "block")
        menu.style.display = "none";
    else
        menu.style.display = "block";   
}