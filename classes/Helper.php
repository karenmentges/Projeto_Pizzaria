<?php
abstract class Helper{
    public static function formatPrice($price){
        return "$ ".number_format($price, 2, ",", ".");
    }
}
?>