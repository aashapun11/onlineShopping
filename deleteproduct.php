<?php

session_start();
include_once "connection.php";
error_reporting(0);
$productid = $_POST['productid'];
$deleteQuery = "delete from products where productid='$productid'";
if (mysqli_query($con, $deleteQuery)) {
    header("location:viewproducts.php");
} else {
    echo "deletion failed";
}



