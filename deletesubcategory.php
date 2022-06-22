<?php
session_start();
include_once "connection.php";
error_reporting(0);
$subcategoryid = $_POST['subcategoryid'];
$deleteQuery = "delete from subcategory where subcategoryid='$subcategoryid'";
if (mysqli_query($con, $deleteQuery)) {
    header("location:viewsubcategory.php");
} else {
    echo "deletion failed";
}

?>





