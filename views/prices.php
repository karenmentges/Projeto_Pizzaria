<main>
    <legend>Prices</legend>
    <table>
        <tr>
            <th class="size">Size</th>
            <th class="amount">Flavors amount</th>
            <th class="price">Price</th>
        </tr>
        <tr>
            <?php
            // forma mais fácil e direta de usar o PDo na página:
            $conexao = new PDO("mysql:host=localhost;dbname=pizza", "admpizza", "12345");
            $query = $conexao->prepare("SELECT * FROM sizePizza");
            $query ->execute();
            $array = $query ->fetchAll(PDO::FETCH_ASSOC); 
            foreach($array as $option) {         
            ?>
                <tr>
                    <td class="size"><?=$option['name']?></td>
                    <td class="amount"><?=$option['flavorsAmount']?></td>
                    <td class="price">$ <?=number_format($option['price'], 2, ",", ".")?></td>
                </tr>
            <?php
            }
            ?>
        </tr>
    </table>
</main>