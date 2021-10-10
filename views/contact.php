<main>
    <form method="get" id="form_contact" novalidate> 
        <legend>Contact Us</legend>
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" size="50" maxlength="50" required autocomplete="off" autofocus>
            <div id="error_name"></div>
        </div>
        <div>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email">
            <div id="error_email"></div>
        </div>
        <div>
            <label for="fone">Phone:</label><br>
            <input type="tel" name="phone" id="fone">
            <div id="error_phone"></div>
        </div>
        <div>
            <label for="subject">Subject:</label><br>
            <select name="subject" id="subject">
                <option value="">Select</option>
                <option value="1">Doubts</option>
                <option value="2">Suggestions</option>
                <option value="3">Reviews</option>
                <option value="4">Compliments</option>
            </select>
            <div id="error_subject"></div>
        </div>
        <div>
            <label for="msg">Message:</label><br>
            <textarea name="mensagem" id="msg" cols="70" rows="5"></textarea>
            <div id="count">0/300</div>
            <div id="error_msg"></div>
        </div>
        <div>
            <input type="submit" name="send" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </div>
    </form>
    <div>
        <legend>Our location</legend>
        <p class="text">Crazy Pizza Street, PPP</p> 
        <p class="text">Wonderland - State of Pizza</p><br>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14204.18257333222!2d-52.722257830224606!3d-27.123372299999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1566247784124!5m2!1spt-BR!2sbr"
            width="450" height="350" frameborder="0" style="border:0" allowfullscreen>
        </iframe>
    </div>
</main>
<script src="assets/js/contact.js"></script>