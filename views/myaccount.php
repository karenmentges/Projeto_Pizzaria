<?php
    include_once("classes/OrderDAO.php");
    include_once("classes/FlavorDAO.php");
    include_once("classes/CartItem.php");
    include_once("classes/Helper.php");
    $obj = new OrderDAO();
    $list = $obj->searchClient($_SESSION['code']);
    $objf = new FlavorDAO();
    $a=0;
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
                    <tr class="titleOrder">
                        <th colspan="2">Code</th>
                        <th>Delivery Fee</th>
                        <th>Delivery Type</th>
                        <th>Date</th>
                    </tr>
                    <tr class="contentOrder">
                        <td colspan="2"><?=$a+1?></td>
                        <td><?=$order->getDeliveryFee()?></td>
                        <td><?=$order->getDeliveryType()?></td>
                        <td><?=$order->getDateOrder()?></td>
                    </tr>
                    <tr class="titleItem">
                        <th>Item</th>
                        <th>Size</th>
                        <th>Flavors</th>
                        <th>Edge</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    $codOrder = $order->getCode();
                    $array = $obj->searchItemOrder($codOrder);
                    $listItem = array($array);
                    foreach($listItem as $item){
                        for ($i=0; $i < sizeof($item); $i++) { 
                            $size = $item[$i]['codSize'];
                            $flavor1 = $objf->search($item[$i]['flavor1']);
                            $flavor2 = $objf->search($item[$i]['flavor2']);
                            $flavor3 = $objf->search($item[$i]['flavor3']);
                            $flavor4 = $objf->search($item[$i]['flavor4']);
                            $flavor5 = $objf->search($item[$i]['flavor5']);

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
                            <tr class="contentItem">
                                <td><?=$i+1?></td>
                                <td><?=$namesize?></td>
                                <td><?=$flavors?></td>
                                <td> <?if($item[$i]['edge']==1){ echo "Borderless"; } else if($item[$i]['edge']==2){ echo "Catupiry"; } else if($item[$i]['edge']==3){ echo "Cheddar"; } else if($item[$i]['edge']==4){ echo "Chocolate"; }?></td>
                                <td><?=Helper::formatPrice($price)?></td>
                            </tr>
                            <?php
                        }
                    }
                    $a++;
                }
                ?>
            </table>
            <?php
        }
        ?>
    </div>
    <br><br>
</main>