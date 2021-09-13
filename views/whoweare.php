<?php
    include_once("views/layout/header.php");

    if(isset($_GET['acao']))
        include_once("views/{$_GET['acao']}.php");
    else
        include_once("views/whoweare.php");

    include_once("views/layout/rodape.php");
?>