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
    <title>Add Subcategory</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
include_once "connection.php";
?>

<div class="container">
    <form action="" method="POST">
        <h2>Add subcategory</h2>

        <div class="form-group">
            <?php
            $select= "SELECT * FROM `category`";
            $exe = mysqli_query($con,$select);

            ?>
            <label for ="categoryName">categoryName</label>
            <select name="categoryName" class="form-control">
                <option value="">--select--</option>
                <?php
                while($rows = mysqli_fetch_assoc($exe)) {
                    ?>
                    <option value="<?php echo $rows['categoryName'] ?>"><?php echo $rows['categoryName'] ?></option>
                    <?php
                }
                ?>

            </select>

        </div>

        <div class="form-group">
            <label for="subcategoryName">subcategoryName</label>
            <input type="text" name="subcategoryName" id="subcategoryName"  class="form-control">
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
include_once "connection.php";
if (isset($_POST['submit'])) {
    error_reporting(0);
    $categoryName = $_POST['Category Name'];
    $subcategoryName = $_POST['Sub Category Name'];
    $description = $_POST['Description'];
    $insertQuery = "INSERT INTO `Sub Category` (`Category Name`,`Sub Category Name`,`Description`) VALUES ('$categoryName','$subcategoryName','$description')";
    $result = mysqli_query($con, $insertQuery);
    if ($result) {
        echo "<script>window.location.href='viewsubcategory.php'</script>";

    } else {
        echo "insert failed";
    }
}
?>