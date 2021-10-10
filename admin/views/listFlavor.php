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
                <th class="code">Code</th>
                <th class="name">Name</th>
                <th class="ingred">Ingredients</th>
                <th class="action">Actions</th>
            </tr>
            <?php
            foreach($list as $flavor){
                ?>
                <tr>
                    <td class="code"><?=$flavor->getCode()?></td>
                    <td class="name"><?=$flavor->getName()?></td>
                    <td class="ingred"><?=$flavor->getIngredients()?></td>
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