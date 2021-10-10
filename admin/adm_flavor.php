<?php
include_once "views/layout/header.php";
include_once "../classes/FlavorDAO.php";
if(!isset($_GET['acao'])){
    // nenhuma acao: carrega pg inicial de adm. de sabores 
    $title = "Flavor List";
    $obj = new FlavorDAO();
    $list = $obj->list();
    include "views/listFlavor.php";
}
else {   
	switch($_GET['acao']){

        case 'insert':
            $title = "Flavor Registration";
            if(!isset($_POST['insert'])) { //ao carregar formulario
                include "views/insertFlavor.php";
            }
            else { // apos submeter os dados 
                $new = new Flavor();
                $new->setName($_POST['field_name']);
                $new->setIngredients($_POST['field_ingredients']);
                $new->setNameImage($_FILES['field_image']['name']);
                $erros = $new->validate();
                if(count($erros) != 0){ // algum campo não validou
                    include "views/insertFlavor.php";
                }
                else{
                    //sem erros de validacao, fazer o upload
                    $destination = "../assets/images/".$_FILES['field_image']['name'];
                    if(move_uploaded_file($_FILES['field_image']['tmp_name'], $destination)){
                        // upload bem sucedido, insere no BD
                        $bd = new FlavorDAO();
                        if($bd->insert($new))
                            header("Location: adm_flavor.php");
                    }
                } 
            }
                     
            break;

        
        case 'update':
            $title = "Flavor Update";
            if(!isset($_POST['update'])) { //ao carregar formulario
               $obj = new FlavorDAO();
               $flavor = $obj->search($_GET['cod']);
               if(is_object($flavor)) // registro com aquele codigo existe
                   include "views/updateFlavor.php";
               else // retornou falso; codigo nao existe na tabela
                   header("Location: adm_flavor.php");     
            }
            else { // apos submeter os dados 
                $updated = new Flavor();
                $updated->setName($_POST['field_name']);
                $updated->setIngredients($_POST['field_ingredients']);
                $updated->setNameImage($_FILES['field_image']['name']);
                $updated->setCode($_POST['cod']);
                $erros = $updated->validate();
                if(count($erros) != 0){ // algum campo não validou
                    include "views/updateFlavor.php";
                }
                else{
                    //sem erros de validacao, fazer o upload
                    $destination = "../assets/images/".$_FILES['field_image']['name'];
                    if(move_uploaded_file($_FILES['field_image']['tmp_name'], $destination)){
                        // upload bem sucedido, insere no BD
                        $bd = new FlavorDAO();
                        if($bd->update($updated))
                            header("Location: adm_flavor.php");
                    }
                } 
            }                        
            break;

        
        case 'delete':
            $bd = new FlavorDAO();
            $retorno = $bd->delete($_GET['cod']);
            if(is_bool($retorno))
                header("Location: adm_flavor.php");
            else{
                echo "<p>$retorno</p>";
            }    
            break;
        
        default:
            echo "Action not allowed!";  
                      
    }// fim switch
} // fim else
include_once "views/layout/footer.php";
?>