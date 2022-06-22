<?php
include "cart.php";
session_start();
include "connection.php";

date_default_timezone_set("Asia/Kolkata");

if (isset($_SESSION["user_email"])) {
    $email = $_SESSION["user_email"];

    $user = "SELECT * FROM `user_signup` where email='$email'";
    $user_result = mysqli_query($con, $user);
    $user_row = mysqli_fetch_array($user_result);
}

$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$remarks = $_POST['remarks'];
$paymentmethod = $_POST['paymentmethod'];

$ar = array();
$grandTotal = 0;

if (isset($_SESSION['products'])) {
    $ar = $_SESSION['products'];
    foreach ($ar as $item) {
        $discountedPriceTotal = round($item->price - (($item->price * $item->discount) / 100), 2);
        $netpriceTotal = $discountedPriceTotal * $item->qty;
        $grandTotal += $netpriceTotal;
    }
}

$currentDateTime = date('Y-m-d H:i:s');
$sql = "INSERT INTO `bill`(`id`, `grandtotal`, `datetime`, `paymentmethod`, `city`, `zipcode`, `address`, `remarks`,`status`, `trackingid`, `companyname`, `trackingurl`, `trackremarks`, `personreceived`, `returnremarks`, `email`) 
VALUES (null ,'$grandTotal','" . $currentDateTime . "','$paymentmethod','$city','$zipcode','$address','$remarks','pending',null,null,null,null,null,null,'$email')";
mysqli_query($con, $sql);
//echo $sql;

// Current Bill ID
$billid = $con->insert_id;

$msg = "Dear " . $user_row['fullname'] . ",\nThank you for Shopping with us.\n Order No. " . $billid . "\n Order Date/Time " . $currentDateTime . "\n";

foreach ($ar as $item) {
    $discountedPriceTotal = round($item->price - (($item->price * $item->discount) / 100), 2);
    $netpriceTotal = $discountedPriceTotal * $item->qty;

    $s = "INSERT INTO `bill_detail`(`id`, `price`, `discount`, `netprice`, `quantity`, `productid`, `billid`) 
    VALUES (null ,'" . $item->price . "','" . $item->discount . "','" . $discountedPriceTotal . "','" . $item->qty . "','" . $item->id . "','" . $billid . "')";
    mysqli_query($con, $s);

    // Update Product Stock
    $stock = $item->stock - $item->qty;
    $update = "UPDATE `product` SET `stock`='$stock' WHERE `productid`=" . $item->id;
    mysqli_query($con, $update);

    $msg .= $item->productname . " (" . $discountedPriceTotal . " X " . $item->qty . ") = " . $netpriceTotal . "\n";
}

$_SESSION['products'] = null;
unset($_SESSION['products']);

if ($paymentmethod == "cash") {
    header("Location:thanks.php?bid=" . $billid);
} else {
    echo $billid;
}
?>
