<?php
include "connection.php";
include "cart.php";
@session_start();

$arr = array();

if (isset($_SESSION['user_email'])) {
    if (isset($_SESSION['products'])) {
        $arr = $_SESSION['products'];
        if (count($arr) == 0) {
            header("Location: index.php");
        }
    } else {
        ?>
        <script>
            alert("Cart is empty..!");
            window.location.href = "index.php";
        </script>
        <?php
//        header("Location: index.php");
    }
} else {
    ?>
    <script>
        alert("Please Login..!");
        window.location.href = "index.php";
    </script>
    <?php
//    header("Location: index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <?php
    include_once "headerfiles.php";
    ?>

    <style>
        textarea {
            resize: none;
        }
    </style>

    <script src="js/script.js"></script>
</head>
<body onload="getCartCount()">

<!--HEADER-->
<?php
include_once "publicheader.php";
?>
<!--//HEADER-->

<?php
$Cart = $_SESSION['products'];

if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];

    $seletUser = "SELECT * FROM `user_signup` WHERE email='$email'";
    $run = mysqli_query($con, $seletUser);
    $user_row = mysqli_fetch_assoc($run);
}
?>

<div class="container">
    <div class="py-5">
        <h4 class="mb-4">Your shopping cart contains: <span class="text-danger"><?php echo count($arr) ?></span>
            Products.</h4>

        <div class="table-responsive">
            <table class="table table-striped border">
                <thead>
                <tr class="text-center">
                    <th>Sr. No.</th>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Net Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $srno = 1;
                $grandTotal = 0;
                foreach ($arr as $item) {
                    $discountedPrice = round($item->price - (($item->price * $item->discount) / 100));
//                    $discountedPrice = round($item->price - (($item->price * $item->discount) / 100), 2);
                    $netPrice = $discountedPrice * $item->qty;
                    $grandTotal += $netPrice;
                    ?>
                    <tr class="text-center">
                        <td><?php echo $srno; ?></td>
                        <td>
                            <img src="<?php echo $item->photo; ?>" alt="Product" style="height: 50px">
                        </td>
                        <td><?php echo $item->productname; ?></td>
                        <td>&#x20b9; <?php echo $item->price; ?></td>

                        <td>
                            <?php
                            if ($item->discount > 0) {
                                echo $item->discount;
                            } else {
                                echo "NA";
                            }
                            ?>
                        </td>

                        <td>
                            <!-- Change Qty -->
                            <div>
                                <button onclick="changeQty(<?php echo $item->id; ?>,'minus',<?php echo $item->stock; ?>)"
                                        title="Minus" type="button" class="btn btn-dark">
                                    <i id="minusicon-<?php echo $item->id; ?>"
                                       class="fa fa-minus"
                                        <?php if ($item->qty <= 1) {
                                            echo "disabled";
                                        } ?>></i>
                                </button>

                                <input type="text" name="quantity-<?php echo $item->id; ?>"
                                       id="quantity-<?php echo $item->id; ?>"
                                       value="<?php echo $item->qty; ?>"
                                       readonly style="width: 40px;text-align: center;padding: 5px 0">

                                <button onclick="changeQty(<?php echo $item->id; ?>,'plus',<?php echo $item->stock; ?>)"
                                        title="Plus" type="button" class="btn btn-dark">
                                    <i id="plusicon-<?php echo $item->id; ?>" class="fa fa-plus"
                                        <?php if ($item->qty >= $item->stock) {
                                            echo "disabled";
                                        } ?>></i>
                                </button>
                            </div>
                            <!-- //Change Qty -->
                        </td>

                        <td>&#x20b9; <?php echo $discountedPrice; ?></td>

                        <td id="netprice-<?php echo $item->id; ?>">&#x20b9; <?php echo $netPrice; ?></td>

                        <td>
                            <a href="#" title="Remove" onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $srno++;
                }
                ?>
                </tbody>
            </table>
            <hr>
        </div>

        <div class="row">
            <div class="col-lg-8 text-center mt-5">
                <a href="index.php" class="btn btn-info">
                    <h4>Continue Shopping</h4>
                </a>
            </div>

            <div class="text-right col-lg-4">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5>Grand Total</h5>
                    </div>
                    <div class="card-body">
                        <span class="font-weight-bold">&#x20b9;</span>
                        <input class="text-right" type="text" readonly id="grandTotal"
                               value="<?php echo $grandTotal; ?>">
                        <input type="hidden" id="emailid" value="<?php echo $user_row['email']; ?>">
                        <input type="hidden" id="mobile" value="<?php echo $user_row['mobile']; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <hr style=" border: 3px solid green; border-radius: 5px;">

            <h3 style="text-decoration: underline">Add Billing Details</h3>

            <form action="insertPayment.php" method="post" id="checkoutForm" class="mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <textarea data-rule-required="true" name="address" id="address" class="form-control"
                                      placeholder="Enter Address.."></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city">City <span class="text-danger">*</span></label>
                            <select data-rule-required="true" name="city" id="city" class="form-control">
                                <option value="">Select City</option>
                                <option value="Amritsar">Amritsar</option>
                                <option value="Jalandhar">Jalandhar</option>
                                <option value="Ludhiana">Ludhiana</option>
                                <option value="Bathinda">Bathinda</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="zipcode">Zipcode <span class="text-danger">*</span></label>
                            <input data-rule-required="true" type="text" id="zipcode" name="zipcode"
                                   class="form-control" placeholder="Enter Zipcode">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="remarks">Remarks <span class="text-danger">*</span></label>
                            <textarea data-rule-required="true" name="remarks" id="remarks" class="form-control"
                                      placeholder="Add Remarks.."></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="paymentmethod">Payment Mode: </label>
                            <input type="radio" id="cash" name="paymentmethod" value="Cash"> COD
                            <input checked type="radio" id="online" name="paymentmethod" value="Online"> Online
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="checkbox"> I have read and agree to the website <a href="javascript:void(0);">terms
                                and
                                condition</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" id="placeOrder" class="btn btn-primary">Proceed To Checkout</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!--FOOTER-->
<?php
include_once "footer.php";
?>
<!--//FOOTER-->

</body>
</html>