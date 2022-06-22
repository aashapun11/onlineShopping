<option value="">--Select Subcategory--</option>

<?php

include_once "connection.php";

if (isset($_GET['cat'])) {
    $category = $_GET['cat'];

    $select = "SELECT * FROM `subcategory` WHERE categoryName='$category'";
    $exe = mysqli_query($con, $select);
    while ($row = mysqli_fetch_array($exe)) {
        echo "<option value='$row[0]'>$row[1]</option>";
    }

}
