<aside>
    <div class="menu_web">
        <?php
        if(isset($_SESSION['name'])) // esta logado
            echo "Hello, {$_SESSION['name']} (<a href='index.php?acao=exit'>exit</a>)";
        else    
            echo "Hello, visitor! (<a href='index.php?acao=client'>login</a>)";
        ?>
        &nbsp;&nbsp;
        <a href="index.php?acao=cart"><i class='bx bxs-cart' >&nbsp;</i>My cart<?=isset($_SESSION['cart']) ? "(".count($_SESSION['cart']).")" : "(0)"; ?></a>
    </div>
    
    <div class="ad" id="ad1">
        <div class="t_ad">
            Double Wednesday
        </div> 
        <br><br> Order two pizzas and <br> get one for free
    </div>
    <div class="ad" id="ad2">
        <div class="t_ad">Sweet Monday</div>
        <br><br> 40% OFF
    </div>
</aside>