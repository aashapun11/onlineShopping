<?php
session_start();
include_once "connection.php";
if(isset($_SESSION["shopping_cart"])){
    $item_array_productid=array_column(    $_SESSION["shopping_cart"],"item_productid");
    if(!in_array($_GET["productid"], $item_array_productid)){
        $count=count($_SESSION["shopping_cart"]);
        $item_array=array(
            'item_productid' => $_GET["productid"],
            'item_productname' => $_GET["productname"],
            'item_price' => $_GET["price"],
            'item_discount' => $_GET["discount"]
        );
        $_SESSION["shopping_cart"][$count]=$item_array;

    }else{

        echo'<script>alert("Item already added")</script>';

    }


}else {
    $item_array = array(

        'item_productid' => $_GET["productid"],
        'item_productname' => $_GET["productname"],
        'item_price' => $_GET["price"],
        'item_discount' => $_GET["discount"]
    );
    $_SESSION["shopping_cart"][0]=$item_array;
}
?>



















