<main>
    <legend><?=$title?></legend>
    <br><br>
    <?php
    $a=0;
    if(count($list) == 0){
        echo "<p>No order registered!</p>";
    }
    else{
        ?>
        <table>
            <tr class="titleOrder">
                <th>Code</th>
                <th>Client</th>
                <th>Delivery Fee</th>
                <th>Delivery Type</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php
            foreach($list as $order){
                $client = $objc->search($order->getCodClient());
                ?>
                <tr class="contentOrder">
                    <td><?=$order->getCode()?></td>
                    <td><?=$client->getName()?></td>
                    <td><?=$order->getDeliveryFee()?></td>
                    <td><?=$order->getDeliveryType()?></td>
                    <td><?=$order->getDateOrder()?></td>
                    <td><?=$order->getStatus()?></td>
                </tr>
                <tr class="titleItem">
                    <th>Item</th>
                    <th>Size</th>
                    <th colspan="2">Flavors</th>
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
                            <td colspan="2"><?=$flavors?></td>
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
    <br><br>
</main>