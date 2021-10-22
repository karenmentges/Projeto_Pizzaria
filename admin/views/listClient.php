<main>
    <legend><?=$title?></legend>
    <br><br>
    <p class="buttonnew"><a href="adm_client.php?acao=insert">Register new</a></p>
    <?php
    if(count($list) == 0){
        echo "<p>No client registered!</p>";
    }
    else{
        ?>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>State</th>
                <th>City</th>
                <th>Address</th>
                <th>District</th>
                <th class="action">Actions</th>
            </tr>
            <?php
            foreach($list as $client){
                ?>
                <tr>
                    <td><?=$client->getCode()?></td>
                    <td><?=$client->getName()?></td>
                    <td><?=$client->getEmail()?></td>
                    <td><?=$client->getPhone()?></td>
                    <td><?=$client->getBirthDate()?></td>
                    <td><?=$client->getState()?></td>
                    <td><?=$client->getCity()?></td>
                    <td><?=$client->getAddress()?></td>
                    <td><?=$client->getDistrict()?></td>
                    <td class="action">
                    <a href="adm_client.php?acao=update&cod=<?=$client->getCode()?>">update</a> 
                    | 
                    <a href="adm_client.php?acao=delete&cod=<?=$client->getCode()?>" onclick="return confirm('Are you sure you want to delete this item?')">delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
    <br><br>
</main>