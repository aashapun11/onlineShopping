
<?php
session_start();
?>
<?php
include_once "connection.php";
error_reporting(0);
$subcategoryid=$_GET['subcategoryid'];
$subcategoryName=$_GET['subcategoryName'];
$description=$_GET['description'];
$categoryName=$_GET['categoryName'];
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Subcategory</title>
        <?php
        include_once "headerfiles.php";
        ?>
    </head>
    <body>
    <?php
    include_once "adminheader.php";
    ?>
    <div class="container">
        <form action="" method="post">
            <h2>Edit Subcategory</h2>

            <div class="form-group">
                <label for="categoryName">categoryName</label>
                <input type="text" name="categoryName" value="<?php echo $categoryName ?>" id="categoryName" readonly class="form-control">
            </div>

            <div class="form-group">
                <label for="subcategoryName">subcategoryName</label>
                <input type="text" name="subcategoryName" id="subcategoryName" class="form-control" value="<?php echo $subcategoryName; ?>">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" name="description" value="<?php echo $description ?>" id="description" class="form-control">
            </div>

            <div class="form-group">
                <input type="hidden" name="action" value="update" id="action">
                <input type="hidden" name="subcategoryid" value="<?php echo $subcategoryid; ?>">
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
if(isset($_POST['submit']))
//if($_GET['submit'])
{
   $subcategoryID=$_POST['subcategoryid'];
   $subcategoryName=$_POST['subcategoryName'];
   $description=$_POST['description'];
   $categoryName=$_POST['categoryName'];

$updatequery="UPDATE `subcategory` SET subcategoryName='$subcategoryName' , description='$description', categoryName='$categoryName' WHERE subcategoryid ='$subcategoryid' ";
$result=mysqli_query($con,$updatequery);
if($result) {
    echo "<script>window.location.href='viewsubcategory.php'</script>";
} else {
        echo "update failed";
}
}
?>