<?php
if(isset($_POST['loginto'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    if($login == 'admin'){ // login correto
        // a senha eh pizza123
        if(password_verify($password, '$2y$10$Izh5K2nk22X/IlUlYiM3DOHtUUPORvGjKOIgGjm8/C8KPF5bNOLxy')){ // senha correta
            session_start();
            $_SESSION['user'] = "admin";
            $_SESSION['logged'] = true;
            $_SESSION['start'] = date("d/m/y H:i:s");
            header("Location: begin.php");
        }
        else{
            $erro = "Incorrect password!";
        }
    }
    else{ // erro de login
        $erro = "Invalid login!";
    }
}
?>
<!doctype html>
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
        </header>
        <main>
            <legend>Restricted Area</legend>
            <form method="POST" action="#">
                <fieldset>                 
                    <div>
                        <label for="login">Login: </label><br>
                        <input type="text" name="login" size="50" maxlength="50" id="login">
                    </div>
                    <div>
                        <label for="password">Password: </label><br>
                        <input type="password" name="password" size="50" maxlength="50" id="password">
                    </div>
                    <div>
                        <input type="submit" value="Login" name="loginto">
                        <input type="reset" value="Reset">
                    </div>
                    <div class="erro_form">
                        <?php
                        if(isset($erro))
                            echo $erro;
                        ?>    
                    </div>
                </fieldset>
            </form>
        </main>
    </div>
</body>
</html>