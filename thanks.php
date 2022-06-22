<?php
include "cart.php";
@session_start();
include "connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You</title>

    <?php include "headerfiles.php"; ?>

    <script src="js/script.js"></script>
</head>
<body onload="getCartCount()">

<!--HEADER-->
<?php
include_once "publicheader.php";
?>
<!--//HEADER-->

<div class="container">
    <div class="jumbotron text-center mt-5">
        <div class="img-thumbnail-3">
            <i class="text-success far fa-5x fa-check-circle"></i>
        </div>

        Thank you for Booking with us. Your Booking ID is <?php echo $_REQUEST['bid']; ?>
    </div>
</div>

<!--FOOTER-->
<?php
include_once "footer.php";
?>
<!--//FOOTER-->

</body>
</html>
