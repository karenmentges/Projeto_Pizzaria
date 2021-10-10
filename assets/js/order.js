var flavorsAmount;

/* funcao chamada quando ocorre mudanca no campo tamanho */
function selectSize(){
    let selectedSize = document.getElementById("size").value;
    if(selectedSize == ""){
        document.getElementById("options_order").style.display = "none";
    }
    else{
        document.getElementById("options_order").style.display = "block";
      //  document.getElementById("limitFlavors").innerHTML = sizeOptions[selectedSize];
        document.getElementById("numFlavors").innerHTML = 0;

        // ajax
        let req = new XMLHttpRequest();
        req.open("GET", "ajax/size.php?initials="+selectedSize, true);
        req.send();
        req.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                let data = JSON.parse(this.responseText);
                flavorsAmount = data.flavorsAmount;
                document.getElementById("showPrice").innerHTML = parseFloat(data.price).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
                document.getElementById("limitFlavors").innerHTML = data.flavorsAmount;
                document.getElementById("price").value = data.price;
                document.getElementById("codSize").value = data.code;
                document.getElementById("nameSize").value = data.name;
            }
        };
        // fim ajax

        // limpar todos os checkboxes
        let checks = document.getElementsByName("flavors[]");
        for(let i = 0; i < checks.length; i++)
            checks[i].checked = false;
            
        // retirar estilo selecionado de todas as divs
        let divs = document.getElementsByClassName("flavor");
        for(let i = 0; i < divs.length; i++)    
            divs[i].classList.remove("selected");
    }
}
/* Associa a função ao envento change do campo tamanho */
document.getElementById("size").addEventListener('change', selectSize);


/* Função auxiliar que realiza a contagem de checkboxes selecionados */
function countSelected(){
    let total = 0;
    let checks = document.getElementsByName("flavors[]");
    for(let i=0; i<checks.length; i++){
        if(checks[i].checked){
            total++;
        }
    }
    return total;
}

/* Função chamada quando um checkbox for marcado ou desmarcado */
function updateCount(){
    let selectedSize = document.getElementById("size").value;
    let total = countSelected();
    document.getElementById("numFlavors").innerHTML = total;
    if(total>flavorsAmount){
        alert("You exceeded the number of flavors allowed");
    }
}

/* Função que alterna entre os estilos de sabor selecionado ou não selecionado */
function toggleSelected(event){
    let id = event.target.value;
    let div = document.getElementById("flavor"+id);
    if(div.classList.contains("selected")) {
        div.classList.remove("selected");
    }
    else {
        div.classList.add("selected");
    }
}

/* Associa funções ao evento click dos checkboxes */
let checks = document.getElementsByName("flavors[]");
for(let i=0; i<checks.length; i++){
    checks[i].addEventListener('click', updateCount);
    checks[i].addEventListener('click', toggleSelected);
}

/* Função que verifica dados antes de submeter ao carrinho */
function addToCart(event){
    let selectedSize = document.getElementById("size").value;
    let total = countSelected();
    if(total>flavorsAmount){
        alert("You exceeded the number of flavors allowed");
        event.preventDefault(); //interromper a submissão do form
    }
    else if(total == 0) {
        alert("You need to select at least one flavor");
        event.preventDefault(); //interromper a submissão do form
    }  
}
/* Associa função ao evento do formulário */
document.getElementById("form_order").addEventListener('submit', addToCart);