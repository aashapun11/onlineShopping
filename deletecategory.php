<?php
session_start();
include_once "connection.php";

        $categoryName = $_POST['categoryName'];
        $deleteQuery = "delete from category where categoryName='$categoryName'";
        if (mysqli_query($con, $deleteQuery)) {
            header("location:viewcategory.php");
        } else {
            echo "deletion failed";
        }

?>




