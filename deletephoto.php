<?php
session_start();
include_once "connection.php";
error_reporting(0);

$photoID = $_REQUEST['id'];

$deleteQuery = "DELETE FROM `product_photo` WHERE id='$photoID'";
if (mysqli_query($con, $deleteQuery)) {
    header("location:viewproducts.php");
} else {
    echo "deletion failed";
}



