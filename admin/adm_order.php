<?php
include_once "views/layout/header.php";
include_once "../classes/OrderDAO.php";
include_once "../classes/ClientDAO.php";
if(!isset($_GET['acao'])){
    // nenhuma acao: carrega pg inicial de adm. de sabores 
    $title = "Order List";
    $obj = new OrderDAO();
    $list = $obj->list();
    $objc = new ClientDAO();
    include "views/listOrder.php";
}
include_once "views/layout/footer.php";
?>