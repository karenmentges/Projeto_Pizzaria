<main>
    <form method="POST" action="index.php?acao=login">
        <fieldset>
            <legend>Access your account</legend>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" name="field_email" id="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="field_password" id="password">
            </div>
            <br>
            <div class="error_form">
                <?php
                if(isset($_GET['error']) && $_GET['error'] == 1)
                    echo "Invalid access data!<br><br>";
                ?>
            </div>
            <div>
                <input type="submit" value="Access">
            </div>
            <div id="register">
                <p><a href="index.php?acao=register">Create an account</a></p>
            </div>
        </fieldset>
    </form>
</main>