<?php
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    echo "Access denied!";
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="Shortcut Icon" href="../assets/images/BonAppetit.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>BonAppetit - Back Office</title>
    <meta name="description" content="Hot and delicious pizzas, order now!">
    <meta name="keywords" content="Restaurant, Pizzeria, Pizza, Cheese, Nova Erechim">
    <meta name="author" content="Karen Mentges">
</head>
<body>
    <div class="container">
        <div class="image"></div>
        <header>
            <img src="../assets/images/BonAppetit2.png" width="329" id="logo" alt="Bon Appetit">
            <span id="showMenu" onclick="showMenu()">&equiv; Menu</span>
        </header>
        <nav>
            <ul class="menu">
                <li id="index">
                    <a href="begin.php">
                        <span>Index</span>
                    </a>
                </li>
                <li id="flavors">
                    <a href="adm_flavor.php">
                        <span>Flavors</span>
                    </a>
                </li>
                <li id="clients">
                    <a href="adm_client.php">
                        <span>Clients</span>
                    </a>
                </li>
                <li id="orders">
                        <a href="adm_order.php">
                        <span>Orders</span>
                    </a>
                </li>
                <li id="exit">
                    <a href="exit.php">
                        <span>Exit</span>
                    </a>
                </li>
                <!-- <li id="contact">
                    <a href="index.php?acao=contact">
                        <span>Contact</span>
                    </a>
                </li> -->
            </ul>
        </nav>