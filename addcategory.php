<?php
session_start();
include_once "connection.php";
//$action = $_POST['action'];
?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
    <?php
    include_once "connection.php";
    if(isset($_POST['action'])) {
//        include_once "connection.php";
        error_reporting(0);
        $categoryName = $_POST['categoryName'];
        $description = $_POST['description'];
        $insertQuery = "INSERT INTO `category` (`categoryName`,`description`) VALUES ('$categoryName','$description')";
        $result = mysqli_query($con,$insertQuery);
        if ($result) {
            header("location:viewcategory.php");
        }
        else
        {
            echo "insert failed";
        }
    }
    ?>
<div class="container">
    <form action="" method="POST">
        <h2>Add Category</h2>
        <div class="form-group">
            <label for="categoryName">categoryName</label>
            <input type="text" name="categoryName" id="categoryName"  class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="form-group">
            <input type="hidden" name="action" value="add" id="action">
            <input type="submit" value="Save" class="btn btn-success">
        </div>
    </form>
</div>
<?php
include_once "footer.php";
?>
</body>
    </html><?php
