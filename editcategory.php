<?php
session_start();
?>
<?php
include_once "connection.php";
error_reporting(0);
$categoryName=$_GET['categoryName'];
$description=$_GET['description'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <form action="" method="GET">
    <h2>Edit Category</h2>

    <div class="form-group">
        <label for="categoryName">categoryName</label>
        <input type="text" name="categoryName" value="<?php echo "$categoryName" ?>" id="categoryName" readonly class="form-control">
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" value="<?php echo "$description" ?>" id="description" class="form-control">
    </div>

    <div class="form-group">
        <input type="hidden" name="action" value="update" id="action">
        <input type="hidden" name="categoryName" value="<?php echo $categoryName; ?>">
        <input type="submit" name="submit" value="Save" class="btn btn-success">
    </div>
    </form>
</div>
<?php
include_once "footer.php";
?>
</body>
</html>
<?php
include_once "connection.php";
if($_GET['action'])
//if(isset($_POST['submit']))
{
    $categoryName=$_GET['categoryName'];
    $description=$_GET['description'];
$updatequery="UPDATE `category` SET categoryName='$categoryName' , description='$description' WHERE categoryName='$categoryName' ";
$result=mysqli_query($con,$updatequery);
if($result) {
    echo "<script>window.location.href='viewcategory.php'</script>";
} else {
   echo "update failed";
}
}
?>