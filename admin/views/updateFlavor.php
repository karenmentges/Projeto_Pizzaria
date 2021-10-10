<main>
    <legend><?=$title?></legend>
    <br><br>
    <div class="erro_form">
    <?php
    if(isset($erros) && count($erros) != 0){
        echo "<ul>";
        foreach ($erros as $e)
            echo "<li>$e</li>";
        echo "</ul>";
    }

    $name = (isset($_POST['field_name'])) ? $_POST['field_name'] : $flavor->getName();
    $ingred = (isset($_POST['field_ingredients'])) ? $_POST['field_ingredients'] : $flavor->getIngredients();
    ?>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cod" value="<?=$_GET['cod']?>">
        <div>
            <label for="name">Name: </label><br>
            <input type="text" name="field_name" size="20" maxlength="20" id="name" value="<?=$name?>">
        </div>
        <div>
            <label for="ingred">Ingredients: </label><br>
            <input type="text" name="field_ingredients" size="100" maxlength="100" id="ingred" value="<?=$ingred?>">
        </div>  
        <div>
            <label for="img">Image: </label><br>
            <input type="file" name="field_image" id="img">
        </div>      
        <div>
            <input type="submit" name="update" value="Update">
        </div>
    </form> 
</main>