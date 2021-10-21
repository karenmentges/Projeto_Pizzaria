<main>
    <legend><?=$title?></legend>
    <br><br>
    <p class="buttonnew"><a href="adm_flavor.php?acao=insert">Register new</a></p>
    <?php
    if(count($list) == 0){
        echo "<p>No flavor registered!</p>";
    }
    else{
        ?>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Ingredients</th>
                <th class="action">Actions</th>
            </tr>
            <?php
            foreach($list as $flavor){
                ?>
                <tr>
                    <td><?=$flavor->getCode()?></td>
                    <td><?=$flavor->getName()?></td>
                    <td><?=$flavor->getIngredients()?></td>
                    <td class="action">
                    <a href="adm_flavor.php?acao=update&cod=<?=$flavor->getCode()?>">update</a> 
                    | 
                    <a href="adm_flavor.php?acao=delete&cod=<?=$flavor->getCode()?>" onclick="return confirm('Are you sure you want to delete this item?')">delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</main>