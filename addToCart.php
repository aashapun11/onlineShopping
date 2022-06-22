<?php

include "connection.php";
include "cart.php";
session_start();

$productid = $_REQUEST['pid'];
$qty = $_REQUEST['qty'];

$select = "SELECT * FROM `products` WHERE productid='$productid'";
$run = mysqli_query($con, $select);
$row = mysqli_fetch_assoc($run);

$arr = array();

if (isset($_SESSION['products'])) {
    $arr = $_SESSION['products'];
    $flag = 0;

    foreach ($arr as $item) {
        if ($productid == $item->id) {
            if ($qty == 1) {
                $item->qty += 1;
            }
            $flag = 1;
            break;
        }
    }
    if ($flag == 0) {
        $arr[count($arr)] = new cart($productid, $row['productname'], $row['price'], $row['discount'], $row['stock'], $row['photo'], $qty, $row['subcategoryid']);
    }
    $_SESSION['products'] = $arr;
} else {
    $arr[0] = new cart($productid, $row['productname'], $row['price'], $row['discount'], $row['stock'], $row['photo'], $qty, $row['subcategoryid']);
    $_SESSION['products'] = $arr;
}

echo count($_SESSION['products']);
