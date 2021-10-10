<?php
if(isset($_POST['logar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    if($login == 'admin'){ // login correto
        // a senha eh pizza123
        if(password_verify($senha, '$2y$10$Izh5K2nk22X/IlUlYiM3DOHtUUPORvGjKOIgGjm8/C8KPF5bNOLxy')){ // senha correta
            session_start();
            $_SESSION['usuario'] = "admin";
            $_SESSION['logado'] = true;
            $_SESSION['inicio'] = date("d/m/y H:i:s");
            header("Location: adm_sabor.php");
        }
        else{
            $erro = "Senha incorreta";
        }
    }
    else{ // erro de login
        $erro = "Login inválido";
    }
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Pizzaria Byte - Back Office</title>
    <meta charset="utf-8">
    <meta name="description" content="Site da Pizzaria">
    <meta name="keywords" content="Pizza, Pedido online">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>
    <header>
        <h1>Pizza Byte</h1>
        <p>Área de Administração</p>
    </header>

    <main>
        <h2>Área Restrita</h2>
        <hr>
        <form method="POST" action="#">
            <fieldset>                  
                <legend>Identifique-se</legend>
                <div>
                    <label for="login">Login: </label>
                    <input type="text" name="login" size="50" maxlength="50" id="login">
                </div>
                <br>
                <div>
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" size="50" maxlength="50" id="senha">
                </div>
                <br>
                <div>
                    <input type="submit" value="Logar" name="logar">
                    <input type="reset" value="Limpar campos">
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
</body>

</html>