<main>
    <legend><?=$title?></legend>
    <br><br>
    <!-- <p class="buttonnew"><a href="adm_flavor.php?acao=insert">Register new</a></p> -->
    <?php
    if(count($list) == 0){
        echo "<p>No order registered!</p>";
    }
    else{
        ?>
        <table>
            <tr>
                <th>Code</th>
                <th>Client</th>
                <th>Delivery Fee</th>
                <th>Delivery Type</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
            <?php
            foreach($list as $order){
                $client = $objc->search($order->getCodClient());
                ?>
                <tr>
                    <td><?=$order->getCode()?></td>
                    <td><?=$client->getName()?></td>
                    <td><?=$order->getDeliveryFee()?></td>
                    <td><?=$order->getDeliveryType()?></td>
                    <td><?=$order->getDateOrder()?></td>
                    <td><?=$order->getStatus()?></td>
                    <td><i class='bx bx-search-alt-2'></i></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</main>