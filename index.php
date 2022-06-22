<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Shopping</title>

    <style>
        .cart {
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <?php
    include_once "headerfiles.php";
    ?>
    <script src="js/script.js"></script>
     
</head>
<body  onload="getCartCount()">

<!--HEADER-->
<?php
include_once "publicheader.php";
?>
<!--//HEADER-->

<!--Carousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="image/slider/1.jpg" alt="First slide" style="min-height: 600px">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="image/slider/banner-1.jpg" alt="Second slide" style="min-height: 600px">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="image/slider/3.webp" alt="Third slide" style="min-height: 600px">
        </div>
        </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--//Carousel-->

<!--Products-->
<div class="container">
    <h2 class="text-center text-info py-3" style="text-decoration: underline">Our Collection</h2>

    <div class="row mb-5">
        <?php
        include_once "connection.php";

        $select = "SELECT * FROM `products` order by productid ASC";
        $run = mysqli_query($con, $select);
        while ($row = mysqli_fetch_array($run)) {
            ?>
            <div class="col-lg-3">

                <div class="card" style="width: 100%;">
                    <img src="<?php echo $row['photo']; ?>" width="200" height="200" class="card-img-top"
                         alt="Product Image">
                    <div class="card-body alert-info" style="min-height: 120px">
                        <h4 class="text-center"><?php echo $row['productname']; ?></h4>

                        <div class="row py-2">
                            <div class="col-6 text-center">
                                <span class="card-text">&#x20b9;
                                    <?php echo $dPrice = round($row['price'] - ($row['price'] * ($row['discount'] / 100))); ?>
                                </span>
                            </div>
                            <div class="col-6 text-center">
                                <del class="card-text text-danger">&#x20b9;<?php echo $row['price']; ?></del>
                            </div>
                        </div>

                        <?php
                        if ($row['discount'] > 0) {
                            ?>
                            <div class="text-center">
                                <span class="card-text"><?php echo $row['discount']; ?>% OFF</span>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div><span>&nbsp;</span></div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="py-2 text-center">
                        <?php
                        if ($row['stock'] > 0) {
                            ?>
                            <button onclick="addToCart(<?php echo $row['productid'] ?>,1)" class="btn btn-success"
                                    type="button">
                                Add To Cart
                            </button>
                            <?php
                        } else {
                            ?>
                            <button style="cursor: not-allowed" class="btn btn-danger" type="button">
                                Out of Stock
                            </button>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!--//Products-->

<!--FOOTER-->
<?php
include_once "footer.php";
?>
<!--//FOOTER-->

</body>
</html>

