<?php
include "connection.php";
include "cart.php";
@session_start();

$productid = $_REQUEST['pid'];
$qty = $_REQUEST['qty'];

$selectQuery = "SELECT * FROM `products` WHERE productid='$productid'";
$run = mysqli_query($con, $selectQuery);
$row = mysqli_fetch_assoc($run);

$arr = array();

if (isset($_SESSION['products'])) {
    $arr = $_SESSION['products'];
    $flag = 0;
    $grandTotal = 0;
    $netPrice = 0;

    foreach ($arr as $item) {
        if ($productid === $item->id) {
            $item->qty = $qty;
            $discountedPrice = round($item->price - (($item->price * $item->discount) / 100));
            $netPrice = $discountedPrice * $item->qty;
            $flag = 1;
            break;
        }
    }

    foreach ($arr as $item) {
        $discountedPriceTotal = round($item->price - (($item->price * $item->discount) / 100));
        $netPriceTotal = $discountedPriceTotal * $item->qty;
        $grandTotal += $netPriceTotal;
    }

    $newArr = array("qty" => $qty, "netPrice" => round($netPrice), "grandTotal" => round($grandTotal));
    echo json_encode($newArr);
}