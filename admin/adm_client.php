<?php
include_once "views/layout/header.php";
include_once "../classes/ClientDAO.php";
if(!isset($_GET['acao'])){
    $title = "Client List";
    $obj = new ClientDAO();
    $list = $obj->list();
    include "views/listClient.php";
}
else {   

	switch($_GET['acao']){

        case 'insert':
            $title = "Client Registration";
            if(!isset($_POST['insert'])) { //ao carregar formulario
                include "views/insertClient.php";
            }
            else { // apos submeter os dados 
                $new = new Client();
                $new->setName($_POST['field_name']);
                $new->setEmail($_POST['field_email']);
                $new->setPhone($_POST['field_fone']);
                $new->setBirthDate($_POST['field_db']);
                $new->setPassword($_POST['field_password1']);
                $new->setState($_POST['field_state']);
                $new->setCity($_POST['field_city']);
                $new->setAddress($_POST['field_address']);
                $new->setDistrict($_POST['field_district']);
                $new->setHowMeet($_POST['field_meet']);
                $new->setPizzaPromo($_POST['field_promo1']);
                $new->setPartnersPromo($_POST['field_promo2']);
                $new->setComments($_POST['field_comments']);
                $erros = $new->validate();
                if(count($erros) != 0){ // algum campo não validou
                    include "views/insertClient.php";
                }
                else{
                    //sem erros de validacao, insere no BD
                    $bd = new ClientDAO();
                    if($bd->insert($new)){
                        header("Location: adm_client.php");
                    } 
                } 
            }
                     
            break;

        
        case 'update':
            $title = "Client Update";
            if(!isset($_POST['update'])) { //ao carregar formulario
               $obj = new ClientDAO();
               $client = $obj->search($_GET['cod']);
               if(is_object($client)) // registro com aquele codigo existe
                   include "views/updateClient.php";
               else // retornou falso; codigo nao existe na tabela
                   header("Location: adm_client.php");     
            }
            else { // apos submeter os dados 
                $updated = new Client();
                $updated->setName($_POST['field_name']);
                $updated->setEmail($_POST['field_email']);
                $updated->setPhone($_POST['field_fone']);
                $updated->setBirthDate($_POST['field_db']);
                $updated->setPassword($_POST['field_password1']);
                $updated->setState($_POST['field_state']);
                $updated->setCity($_POST['field_city']);
                $updated->setAddress($_POST['field_address']);
                $updated->setDistrict($_POST['field_district']);
                $updated->setHowMeet($_POST['field_meet']);
                $updated->setPizzaPromo($_POST['field_promo1']);
                $updated->setPartnersPromo($_POST['field_promo2']);
                $updated->setComments($_POST['field_comments']);
                $updated->setCode($_POST['cod']);
                $erros = $updated->validate();
                if(count($erros) != 0){ // algum campo não validou
                    include "views/updateClient.php";
                }
                else{
                    //sem erros de validacao, insere no BD
                    $bd = new ClientDAO();
                    if($bd->update($updated)){
                        header("Location: adm_client.php");
                    } 
                }
            }                        
            break;

        
        case 'delete':
            $bd = new ClientDAO();
            $retorno = $bd->delete($_GET['cod']);
            if(is_bool($retorno))
                header("Location: adm_client.php");
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