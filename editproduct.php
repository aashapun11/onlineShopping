<?php
session_start();
include_once "connection.php";
error_reporting(0);
?>

<?php
if (isset($_REQUEST['pid'])) {
    $ID = $_REQUEST['pid'];

    $select = "SELECT * FROM `products` WHERE productid='$ID'";
    $exe = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($exe);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Edit Products</h2>

        <div class="form-group">
            <label for="productname">Product Name</label>
            <input readonly type="text" name="productname" value="<?php echo $row['productname']; ?>" id="productname"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="tel" name="price" id="price" class="form-control" value="<?php echo $row['price']; ?>">
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" name="discount" value="<?php echo $row['discount'] ?>" id="discount"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="tel" name="stock" value="<?php echo $row['stock']; ?>" id="stock" class="form-control">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-2">
                    <label for="photo">Photo</label>
                </div>
                <div class="col-lg-4">
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo $row['photo'] ?>" style="width: 80px;height: 80px" alt="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" value="<?php echo $row['description'] ?>" id="description"
                   class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update" class="btn btn-success btn-block">
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

if (isset($_POST['submit'])) {
    error_reporting(0);
    $productid = $ID;

    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $editPhoto = "";
    if (isset($_FILES['photo']['tmp_name'])) {
        $editPhoto = $_FILES['photo']['tmp_name'];
    }
    if ($editPhoto != "") {
        $photoName = $_FILES['photo']['name'];
        $photoPath = "uploads/$photoName";
        move_uploaded_file($editPhoto, $photoPath);

        $updatequery = "UPDATE `products` SET  productname='$productname', price='$price', discount='$discount' , stock='$stock', photo='$photoPath',
                  description='$description'  WHERE productid ='$productid'";
        $result = mysqli_query($con, $updatequery);
    } else {
        $updatequery = "UPDATE `products` SET  productname='$productname', price='$price', discount='$discount' , stock='$stock', description='$description' WHERE productid ='$productid'";
        $result = mysqli_query($con, $updatequery);
    }

    if ($result) {
        echo "<script>
        alert('Product Updated Successfully');
        window.location.href='viewproducts.php';
        </script>";
    } else {
        echo "update failed";
    }
}
?>
