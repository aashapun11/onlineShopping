<?php
if (isset($_REQUEST['id'])) {
    $ID = $_REQUEST['id'];
} else {
    header("Location: viewproducts.php");
}
?>

<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Photos</title>

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
    <h2 class="text-center">View photoes</h2>


    <div class="row">
        <?php
        $select = "SELECT * FROM `product_photo` WHERE productid='$ID'";
        $result = mysqli_query($con, $select);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-lg-3">
                    <div class="card" style="width: 100%;">
                        <!--                <div class="card" style="width: 18rem;">-->
                        <img src="<?php echo $row['photo']; ?>" width="200" height="200" class="card-img-top"
                             alt="Product Image">
                        <div class="card-body alert-info" style="min-height: 120px">
                            <p class="card-text"><?php echo $row['caption']; ?></p>
                        </div>

                        <div class="py-2 text-center">
                            <a href="deletephoto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                                Delete <i class="fa fa-trash-alt"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="my-5 col-lg-6 offset-lg-3 text-center alert alert-danger">
                <h3>No data found..!!</h3>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
include_once "footer.php";
?>

</body>
</html>
