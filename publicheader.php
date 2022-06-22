<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a href="index.php" class="navbar-brand"><img  src="image/logo.jpg" style="height: 60px; border-radius: 30px;" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--        <ul class="navbar-nav nav">-->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <i class="fas fa-home"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="adminlogin.php">
                    Admin Login <i class="fas fa-sign-in-alt"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">User</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="usersignup.php">User Signup</a>
                    <a class="dropdown-item" href="userlogin.php">User Login</a>
                </div>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="checkout.php" class="cart btn btn-info text-white nav-link font-weight-bold">
                        Cart <i class="fab fa-opencart"></i> <span class="text-dark" id="cartCount"></span>
                    </a>
                </li>
            </ul>
        </form>
    </div>
</nav>