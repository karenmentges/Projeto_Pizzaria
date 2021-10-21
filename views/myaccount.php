<?php
    include_once("classes/OrderDAO.php");
    include_once("classes/FlavorDAO.php");
    include_once("classes/CartItem.php");
    include_once("classes/Helper.php");
    $obj = new OrderDAO();
    $list = $obj->searchClient($_SESSION['code']);
    $objf = new FlavorDAO();
?>

<main>
    <div class="myaccount">
        <legend>Client Area</legend>
        <h4><?= $_SESSION['name'] ?></h4>
        <p>Code: <?= $_SESSION['code'] ?></p>
        <p>Address: <?= $_SESSION['address'] ?></p>
        <p>District: <?= $_SESSION['district'] ?></p><br>

        <legend>Orders</legend> 
        <?php
        if(count($list) == 0){
            echo "<p>No order registered!</p>";
        }
        else{
            ?>
            <table>
                <?php
                foreach($list as $order){
                    ?>
                    <tr>
                        <th>Code</th>
                        <th>Delivery Fee</th>
                        <th>Delivery Type</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td><?=$order->getCode()?></td>
                        <td><?=$order->getDeliveryFee()?></td>
                        <td><?=$order->getDeliveryType()?></td>
                        <td><?=$order->getDateOrder()?></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <th>Flavors</th>
                        <th>Edge</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    $codOrder = $order->getCode();
                    $array = $obj->searchItemOrder($codOrder);
                    $list = array($array);
                    foreach($list as $item){
                        $size = $item['codSize'];
                        $flavor1 = $objf->search($item['flavor1']);
                        $flavor2 = $objf->search($item['flavor2']);
                        $flavor3 = $objf->search($item['flavor3']);
                        $flavor4 = $objf->search($item['flavor4']);
                        $flavor5 = $objf->search($item['flavor5']);

                        $flavors = "";
                        if($flavor1!=NULL){
                            $flavors .=$flavor1->getName().", ";
                        }
                        if($flavor2!=NULL){
                            $flavors .=$flavor2->getName().", ";
                        }
                        if($flavor3!=NULL){
                            $flavors .=$flavor3->getName().", ";
                        }
                        if($flavor4!=NULL){
                            $flavors .=$flavor4->getName().", ";
                        }
                        if($flavor5!=NULL){
                            $flavors .=$flavor5->getName().", ";
                        }
                        $flavors = substr($flavors, 0, strlen($flavors)-2);
                        
                        if($size==1) {
                            $namesize = "Extra Small";
                            $price = 4;
                        }
                        else if($size==2) {
                            $namesize = "Small";
                            $price = 7;
                        }
                        else if($size==3) {
                            $namesize = "Medium";
                            $price = 10;
                        }
                        else if($size==4) {
                            $namesize = "Large";
                            $price = 13;
                        }
                        else if($size==5) {
                            $namesize = "Extra Large";
                            $price = 16;
                        } 
                        ?>
                        <tr>
                            <td><?=$namesize?></td>
                            <td><?=$flavors?></td>
                            <td> <?if($item['edge']==1){ echo "Borderless"; } else if($item['edge']==2){ echo "Catupiry"; } else if($item['edge']==3){ echo "Cheddar"; } else if($item['edge']==4){ echo "Chocolate"; }?></td>
                            <td><?=Helper::formatPrice($price)?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        }
        ?>
    </div>
</main>