<main>
    <legend>Cart</legend>
    <p class="text">
        <?php
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
            echo "Your cart is empty!";
        else{
            ?>
            <table>
               <tr>
                   <th>Size</th>
                   <th>Flavor</th>
                   <th>Edge</th>
                   <th>Price</th>
                   <th>Delete</th>
               </tr> 
               <?php
               include_once("classes/CartItem.php");
               include_once("classes/Helper.php");
               $total = 0;
               foreach($_SESSION['cart'] as $pos => $item){
                   $item = unserialize($item);
                   $total += $item->getPrice();
                   echo 
                   "<tr>
                        <td>".$item->getNameSize()."</td>
                        <td>".$item->getListFlavors()."</td>
                        <td>".$item->getEdge()."</td>
                        <td>".Helper::formatPrice($item->getPrice())."</td>
                        <td><a href='index.php?acao=delCart&pos=$pos'>delete</a></td>
                    </tr>";    
               }
               ?>
               <tr>
                   <th colspan="3">Total:</th>
                   <th colspan="2"><?=Helper::formatPrice($total)?></th>
               </tr>
            </table>
            <br>
            <form method="post" action="index.php?acao=close" id="form">
                <fieldset>
                    <legend>Delivery options:</legend>
                    <label><input type="radio" name="deliveryoptions" value="0" checked>Pick up at the store</label><br>
                    <label><input type="radio" name="deliveryoptions" value="1">Receive at home</label><br>
                </fieldset>
                <p><a href="index.php?acao=order"><i class='bx bxs-shopping-bag'></i>Keep shopping</a></p>
                <p><a href="#" onclick="if (confirm('Do you confirm the closing of this order?')) document.getElementById('form').submit(); else return false;"><i class='bx bxs-check-circle' ></i>Close order</a></p>
            </form>
            <?php
        }    
        ?>
    </p>
</main>