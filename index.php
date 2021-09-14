<?php
    include_once("views/layout/header.php");

    if(isset($_GET['acao']))
        include_once("views/{$_GET['acao']}.php");
    else
        include_once("views/begin.php");

    include_once("views/layout/aside.php");
    include_once("views/layout/footer.php");
?>