<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hot and delicious pizzas, order now!">
    <meta name="keywords" content="Restaurant, Pizzeria, Pizza, Cheese, Nova Erechim">
    <meta name="author" content="Karen Mentges">
    <title>BonAppetit</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="Shortcut Icon" href="assets/images/BonAppetit.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="image"></div>
        <header>
            <img src="assets/images/BonAppetit2.png" width="329" id="logo" alt="Bon Appetit">
        </header>
        <div id="menu_mobile">
        <?php
            if(isset($_SESSION['name'])){
                ?>
                <span class="material-icons">
                    <a href='index.php?acao=exit'>Exit</a>
                </span>
                <?php
            }
            else {
                ?>
                <span class="material-icons">
                    <a href='index.php?acao=client'>Login</a>
                </span>
                <?php
            }
        ?>
            &nbsp;           
            <span class="material-icons">
                <a href='index.php?acao=cart'>Shopping cart</a><?=isset($_SESSION['cart'])? " (".count($_SESSION['cart']).")" : " (0)"; ?>
            </span>
        </div>
        <span id="showMenu" onclick="showMenu()">&equiv; Menu</span>
        <nav>
            <ul class="menu">
                <li id="index">
                    <a href="index.php">
                        <span>Index</span>
                    </a>
                </li>
                <li id="whoweare">
                    <a href="index.php?acao=whoweare">
                        <span>Who We Are</span>
                    </a>
                </li>
                <li id="prices">
                    <a href="index.php?acao=prices">
                        <span>Prices</span>
                    </a>
                </li>
                <li id="order">
                        <a href="index.php?acao=order">
                        <span>Order</span>
                    </a>
                </li>
                <li id="client">
                    <a href="index.php?acao=client">
                        <span>Client</span>
                    </a>
                </li>
                <li id="contact">
                    <a href="index.php?acao=contact">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </nav>