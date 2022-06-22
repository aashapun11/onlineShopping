<?php
session_start();
include_once "connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>

    <?php
    include_once "headerfiles.php";
    ?>

    <script>
        function getSubCat(catname) {
            // console.log(catname);

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                console.log(this.response);
                document.getElementById("subcategoryName").innerHTML = this.response;
            }
            xhttp.open("GET", "ajaxSubCat.php?cat=" + catname, true);
            xhttp.send();
        }
    </script>
</head>
<body>

<?php
include_once "adminheader.php";
?>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Add Product</h2>

        <div class="form-group">
            <?php
            $select = "SELECT * FROM `category`";
            $exe = mysqli_query($con, $select);
            ?>
            <label for="categoryName">category Name</label>
            <select onchange="getSubCat(this.value)" name="categoryName" class="form-control">
                <option value="">--Select Category--</option>
                <?php
                while ($rows = mysqli_fetch_assoc($exe)) {
                    ?>
                    <option value="<?php echo $rows['categoryName'] ?>"><?php echo $rows['categoryName'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="subcategoryName">subcategory Name</label>
            <select id="subcategoryName" name="subcategoryName" class="form-control">
                <option value="">--Select Subcategory--</option>
            </select>
        </div>

        <div class="form-group">
            <label for="productname">productname</label>
            <input type="text" name="productname" id="productname" class="form-control">
        </div>

        <div class="form-group">
            <label for="stock">stock</label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="number" name="price" id="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="discount">discount</label>
            <input type="number" name="discount" id="discount" class="form-control">
        </div>
        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="form-group">
            <input type="hidden" name="action" value="add" id="action">
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
if (isset($_POST['submit'])) {
    error_reporting(0);
//    print_r($_REQUEST);
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];

    $photo = $_FILES['photo']['tmp_name'];
    $photoName = $_FILES['photo']['name'];
//    $photoPath = "uploads/$photoName";
    $photoPath = "uploads/" . $photoName;
    move_uploaded_file($photo, $photoPath);

    $description = $_POST['description'];
    $subcategoryName = $_POST['subcategoryName'];

    // INSERT INTO `products`(`productid`, `productname`, `price`, `discount`, `stock`, `photo`, `description`, `subcategoryid`) VALUES ()
    $insertQuery = "INSERT INTO `products` (`productid`, `productname`, `price`, `discount`, `stock`, `photo`, `description`, `subcategoryid`) 
         VALUES (null,'$productname','$price','$discount','$stock','$photoPath','$description','$subcategoryName')";
//    echo $insertQuery;
    $result = mysqli_query($con, $insertQuery);
    if ($result) {
        echo "<script>
        alert('Product Added Successfully');
        window.location.href='viewproducts.php';
        </script>";
    } else {
        echo "insert failed";
    }
}
?>
