<?php
    include_once("views/layout/header.php");

    if(isset($_GET['acao'])){

        if($_GET['acao'] == "login"){
            include_once("classes/ClientDAO.php");
            $obj = new ClientDAO();
            if ($res = $obj->autenticate($_POST['field_email'], $_POST['field_password'])){ // sucesso
                $_SESSION['code'] = $res['code'];
                $_SESSION['name'] = $res['name'];
                $_SESSION['address'] = $res['address'];
                $_SESSION['district'] = $res['district'];
                header("Location: index.php?acao=myaccount");
            }
            else{ // login e/ou senha incorretos
                header("Location: index.php?acao=client&error=1");
            } 
        }

        elseif($_GET['acao'] == "exit"){
            session_destroy();
            header("Location: index.php");
        }

        elseif($_GET['acao']=="client" && isset($_SESSION['name'])){ // esta logada e tenta entrar na pagina de login
            header("Location: index.php?acao=myaccount");         
        }

        elseif($_GET['acao'] == "registered"){
            // adicionar
            include_once("classes/Client.php");
            // criando objeto
            $obj = new Client();
            $obj->setName($_POST['field_name']);
            $obj->setEmail($_POST['field_email']);
            $obj->setPhone($_POST['field_fone']);
            $obj->setBirthDate($_POST['field_db']);
            $obj->setPassword($_POST['field_password1']);
            $obj->setState($_POST['field_state']);
            $obj->setCity($_POST['field_city']);
            $obj->setAddress($_POST['field_address']);
            $obj->setDistrict($_POST['field_district']);
            $obj->setHowMeet($_POST['field_meet']);
            $obj->setPizzaPromo($_POST['field_promo1']);
            $obj->setPartnersPromo($_POST['field_promo2']);
            $obj->setComments($_POST['field_comments']);
            $erros = $obj->validate();
            if(count($erros) != 0){ // algum campo não validou
                echo '<script type="text/javascript">alert("It was not possible to register!")</script>';
            }
            else{
                //sem erros de validacao, insere no BD
                include_once("classes/ClientDAO.php");
                $bd = new ClientDAO();
                if($bd->insert($obj)){
                    echo '<script type="text/javascript">alert("Registration accomplished!")</script>';
                    header("Location: index.php?acao=client");
                }                  
            } 
        }

        // carrinho de compras
        elseif($_GET['acao'] == "addCart"){
            // adicionar
            include_once("classes/CartItem.php");
            // criando objeto
            $obj = new CartItem();
            $obj->setCodeSize($_POST['codSize']);
            $obj->setNameSize($_POST['nameSize']);
            $obj->setPrice($_POST['price']);
            foreach($_POST['flavors'] as $flavor){ // percorrendo lista de checkboxes marcados
                $flavor = explode("-", $flavor);
                $selected[] = array($flavor[0], $flavor[1]);
            }
            $obj->setFlavors($selected);
            $obj->setEdge($_POST['edge']);
            // adicionando objeto a session
            $_SESSION['cart'][] = serialize($obj);
            header("Location: index.php?acao=cart");
        }

        elseif($_GET['acao'] == "delCart"){
            // excluir
            unset($_SESSION['cart'][$_GET['pos']]);
            header("Location: index.php?acao=cart");

        }     
        
        elseif($_GET['acao'] == "close"){
            if(!isset($_SESSION['name'])){ // nao logado
                header("Location: index.php?acao=client");
                die(); // interrompe
            }
            include_once("classes/CartItem.php");
            include_once("classes/OrderDAO.php");
            $o = new Order();
            $o->setCodClient($_SESSION['code']);
            $o->setDeliveryFee(0);
            $o->setDeliveryType($_POST['deliveryoptions']);
            $o->setDateOrder(date("Y-m-d H:i:s"));
            $o->setStatus(0);
            // incluir itens
            $listItens = array();
            foreach ($_SESSION['cart'] as $item){
                $listItens[] = unserialize($item);
            }
            $o->setItens($listItens);
            // fim itens
            $bd = new OrderDAO();
            $codOrder = $bd->insert($o);
            if($codOrder){
                echo "<main><div class='warning'><p>Order no. <b>$codOrder</b> has been successfully received! Follow the progress in the customer's area.</p></div></main>";
                unset($_SESSION['cart']); // esvaziar o carrinho
            }
        }

        else
            include_once("views/{$_GET['acao']}.php");
    }

    else
        include_once("views/begin.php");

    include_once("views/layout/aside.php");
    include_once("views/layout/footer.php");
?>