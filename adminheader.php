<?php
if (!isset($_SESSION['admin_username'])) {
    header("location:adminlogin.php");
    header("location:addtocart.php");

    exit();
}

?>

<nav class="navbar navbar-expand-md navbar-light bg-warning sticky-top">
    <a href="index.php" class="navbar-brand"><img src="image/logo.jpg" style="height: 60px; border-radius:30px" alt=""></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mymenu">
        <ul class="navbar-nav nav">
            <li class="nav-item"><a class="nav-link" href="adminhome.php"> <i class="fas fa-home"></i> Home</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Category</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="addcategory.php">Add Category</a>
                    <a class="dropdown-item" href="viewcategory.php">View Category</a>

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">SubCategory</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="addsubcategory.php">Add SubCategory</a>
                    <a class="dropdown-item" href="viewsubcategory.php">View SubCategory</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Products</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="addproducts.php">Add Products</a>
                    <a class="dropdown-item" href="viewproducts.php">View Products</a>

                </div>
            </li>

            <li class="nav-item"><a class="nav-link"
                                    href="changepassword.php">Change Password <i
                            class="fas fa-user-edit"></i> </a></li>

            <li class="nav-item"><a class="nav-link" onclick="return confirm('Are you sure to exit ?')"
                                    href="adminlogout.php">Logout <i
                            class="fas fa-sign-out-alt"></i> </a></li>
        </ul>
    </div>

</nav>
