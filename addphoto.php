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
    <title>Add photo</title>

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
        <h2>Add Photo</h2>

        <div>
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
        </div>

        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="caption" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="submit" class="btn btn-success">
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
    $pID = $_POST['id'];

    $photo = $_FILES['photo']['tmp_name'];
    $photoName = $_FILES['photo']['name'];
    $photoPath = "uploads/" . $photoName;
    move_uploaded_file($photo, $photoPath);

    $caption = $_POST['caption'];

    $Query = "INSERT INTO `product_photo` (`photo`, `caption`,`productid`) VALUES('$photoPath','$caption','$pID')";
    $result = mysqli_query($con, $Query);
    if ($result) {
        echo "<script>;
        alert('Photo Added Successfully');
        window.location.href='viewproducts.php';
        </script>";
    } else {
        echo "insert failed...";
    }
}
?>
