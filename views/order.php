<main>
    <legend>Order your pizza</legend>
    <form id="form_order" method="post" action="index.php?acao=addCart">
        <label for="size">Select the size of the pizza:</label>
        <select name="size" id="size">
            <option value="">---- Select ----</option>
            <option value="es">Extra Small</option>
            <option value="s">Small</option>
            <option value="m">Medium</option>
            <option value="l">Large</option>
            <option value="el">Extra Large</option>
        </select>
        <br><br>
        <div id="options_order">
            <p>Price: <strong id="showPrice">0</strong></p>
            <p>You selected <strong id="numFlavors">0</strong> out of <strong id="limitFlavors">0</strong> flavors</p>
            <input type="hidden" name="price" id="price">
            <input type="hidden" name="codSize" id="codSize">
            <input type="hidden" name="nameSize" id="nameSize">
                        
            <div id="carte">
                <?php
                require_once "classes/FlavorDAO.php";
                $obj = new FlavorDAO();
                $list = $obj->list();
                foreach($list as $flavor){
                ?>
                    <div class="flavor" id="flavor<?=$flavor->getCode()."-".$flavor->getName();?>">
                        <label class="checkbox">
                            <input type="checkbox" name="flavors[]" value="<?=$flavor->getCode()."-".$flavor->getName();?>">
                            <div class="flavor_image">
                                <img src="assets/images/<?=($flavor->getNameImage() == "")? "no_picture.jpg" : $flavor->getNameImage();?>" alt="image: <?=$flavor->getName();?>">
                            </div>
                            <div class="flavor_description">
                                <div class="t_flavor"><?=$flavor->getName();?></div>
                                <div class="i_flavor"><?=$flavor->getIngredients();?></div>
                            </div>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
            <br><br>
            <fieldset>
                <legend>Select the edge option:</legend>
                <label class="radio"><input type="radio" name="edge" value="1" checked>Borderless<span class="option"></span></label><br>
                <label class="radio"><input type="radio" name="edge" value="2">Catupiry<span class="option"></span></label><br>
                <label class="radio"><input type="radio" name="edge" value="3">Cheddar<span class="option"></span></label><br>
                <label class="radio"><input type="radio" name="edge" value="4">Chocolate<span class="option"></span></label><br>
            </fieldset>
            <br><br>
            <input type="submit" value="Add to cart" name="add" id="add">
        </div>
    </form>   
</main>

<div id="doubts">
    <div id="text">Doubts? <br><br> Speak with our attendants.</div>
    <div id="buttons">
        <span id="minHelp" class="btHelp" onclick="minHelp()">&or;</span>
        <span id="maxHelp" class="btHelp" onclick="maxHelp()">&and;</span>
        <span id="closeHelp" class="btHelp" onclick="closeHelp()">x</span>
    </div>            
</div>

<script src="assets/js/order.js"></script>
