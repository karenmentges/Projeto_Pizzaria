    <main>
        <legend>Register</legend>
        <form method="POST" action="">
                <div>
                    <label for="name">Name: </label>
                    <input type="text" name="field_name" id="name" required autofocus autocomplete="off">
                </div>
                <div>
                    <label for="id_email">E-mail: </label>
                    <input type="email" name="field_email" id="email" required>
                </div>
                <div>
                    <label for="fone">Phone: </label>
                    <input type="tel" name="field_fone" id="fone">
                </div>
                <div>
                    <label for="db">Date of birth: </label>
                    <input type="date" name="field_db" id="db">
                </div>
                <div>
                    <label for="password1">Password: </label>
                    <input type="password" name="field_password1" id="password1">
                </div>
                <div>
                    <label for="password2">Confirm password: </label>
                    <input type="password" name="field_password2" id="password2">
                </div>
                <div>
                    <label for="state">State: </label>
                    <input type="text" name="field_address" id="state">
                </div>
                <div>
                    <label for="city">City: </label>
                    <input type="text" name="field_address" id="city">
                </div>
                <div>
                    <label for="aaddress">Address: </label>
                    <input type="text" name="field_address" id="aaddress">
                </div>
                <div>
                    <label for="district">District:</label>
                    <input type="text" name="field_district" id="district">
                </div>


                <div>
                    <fieldset>
                        <legend>How did you meet our company?</legend>
                        <label class="radio"><input type="radio" name="field_meet" value="Physical store" checked>Physical store<span class="option"></span></label>
                        <br>
                        <label class="radio"><input type="radio" name="field_meet" value="Social networks">Social networks<span class="option"></span></label>
                        <br>
                        <label class="radio"><input type="radio" name="field_meet" value="Advertising">Advertising<span class="option"></span></label>
                        <br>
                        <label class="radio"><input type="radio" name="field_meet" value="Friends indication">Friends indication<span class="option"></span></label>
                    </fieldset>
                </div>
                <br>
                <br>
                <div>
                    <label class="checkbox"><input type="checkbox" name="field_promo1" value="sim" checked>
                        I want to receive promotions by e-mail
                        <span class="checkmark"></span>
                    </label>
                    <br>
                    <label class="checkbox"><input type="checkbox" name="field_promo2" value="sim" checked>
                        I want to receive notifications by Whatsapp
                        <span class="checkmark"></span>
                    </label>
                </div>
                <br>
                <br>
                <div>
                    <label for="comments">Comments:</label><br>
                    <textarea name="field_comments" rows="5" cols="50" id="comments"></textarea>
                </div>
                <div>
                    <input type="submit" value="Register">
                    <input type="reset" value="Reset">
                </div>

        </form>
    </main>