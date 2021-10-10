<main>
    <legend><?=$title?></legend>
    <br><br>
    <div class="erro_form">
    <?php
    if(isset($erros) && count($erros) != 0){
        echo "<ul>";
        foreach ($erros as $e)
            echo "<li>$e</li>";
        echo "</ul>";
    }

    $name = (isset($_POST['field_name'])) ? $_POST['field_name'] : $client->getName();
    $email = (isset($_POST['field_email'])) ? $_POST['field_email'] : $client->getEmail();
    $fone = (isset($_POST['field_fone'])) ? $_POST['field_fone'] : $client->getPhone();
    $db = (isset($_POST['field_db'])) ? $_POST['field_db'] : $client->getBirthDate();
    $state = (isset($_POST['field_state'])) ? $_POST['field_state'] : $client->getState();
    $city = (isset($_POST['field_city'])) ? $_POST['field_city'] : $client->getCity();
    $address = (isset($_POST['field_address'])) ? $_POST['field_address'] : $client->getAddress();
    $district = (isset($_POST['field_district'])) ? $_POST['field_district'] : $client->getDistrict();
    $comments = (isset($_POST['field_comments'])) ? $_POST['field_comments'] : $client->getComments();
    ?>
    </div>
    <form action="#" method="post" id="form_register" enctype="multipart/form-data">
        <input type="hidden" name="cod" value="<?=$_GET['cod']?>">
        <div>
            <label for="name">Name: </label><br>
            <input type="text" name="field_name" id="name" value="<?=$name?>" required autofocus>
            <div id="error_name"></div>
        </div>
        <div>
            <label for="id_email">E-mail: </label><br>
            <input type="email" name="field_email" id="email" value="<?=$email?>" required>
            <div id="error_email"></div>
        </div>
        <div>
            <label for="fone">Phone: </label><br>
            <input type="tel" name="field_fone" id="fone" value="<?=$fone?>" required>
            <div id="error_phone"></div>
        </div>
        <div>
            <label for="db">Date of birth: </label><br>
            <input type="date" name="field_db" id="db" value="<?=$db?>" required>
            <div id="error_db"></div>
        </div>
        <div>
            <label for="password1">Password: </label><br>
            <input type="password" name="field_password1" id="password1" minlength="6" required>
            <div id="error_password1"></div>
        </div>
        <div>
            <label for="password2">Confirm password: </label><br>
            <input type="password" name="field_password2" id="password2" minlength="6" required>
            <div id="error_password2"></div>
        </div>
        <div>
            <label for="state">State: </label><br>
            <input type="text" name="field_state" id="state" value="<?=$state?>" required>
            <div id="error_state"></div>
        </div>
        <div>
            <label for="city">City: </label><br>
            <input type="text" name="field_city" id="city" value="<?=$city?>" required>
            <div id="error_city"></div>
        </div>
        <div>
            <label for="aaddress">Address: </label><br>
            <input type="text" name="field_address" id="aaddress" value="<?=$address?>" required>
            <div id="error_address"></div>
        </div>
        <div>
            <label for="district">District:</label><br>
            <input type="text" name="field_district" id="district" value="<?=$district?>" required>
            <div id="error_district"></div>
        </div>
        <div>
            <fieldset>
                <legend id="how">How did you meet our company?</legend>
                <label class="radio"><input type="radio" name="field_meet" value="1" checked>Physical store<span class="option"></span></label>
                <br>
                <label class="radio"><input type="radio" name="field_meet" value="2">Social networks<span class="option"></span></label>
                <br>
                <label class="radio"><input type="radio" name="field_meet" value="3">Advertising<span class="option"></span></label>
                <br>
                <label class="radio"><input type="radio" name="field_meet" value="4">Friends indication<span class="option"></span></label>
            </fieldset>
        </div>
        <br><br>
        <div>
            <label class="checkbox"><input type="checkbox" name="field_promo1" value="1" checked>
                I want to receive promotions by e-mail
                <span class="checkmark"></span>
            </label>
            <br>
            <label class="checkbox"><input type="checkbox" name="field_promo2" value="1" checked>
                I want to receive notifications by Whatsapp
                <span class="checkmark"></span>
            </label>
        </div>
        <br><br>
        <div>
            <label for="comments">Comments:</label><br>
            <textarea name="field_comments" rows="5" cols="50" id="comments"><?=$comments?></textarea>
            <div id="count">0/300</div>
        </div>
        <div>
            <input type="submit" value="Update" name="update">
            <input type="reset" value="Reset">
        </div>
    </form>
</main>
<script src="assets/js/register.js"></script>