<?php
if (!isset($_SESSION['user_email'])) {
    header("location:userlogin.php");

    exit();
}
?>

<nav class="navbar navbar-expand-md navbar-light bg-warning sticky-top">
    <a href="index.php" class="navbar-brand"><img src="image/logo.jpg"  style="height: 60px; border-radius:30px"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mymenu">
        <ul class="navbar-nav nav">
            <li class="nav-item">
                <a class="nav-link" href="userdashboard.php">
                    Home <i class="fas fa-home"></i>
                </a>
            </li>

            <li class="nav-item"><a class="nav-link" href="userchangepassword.php">Change Password <i
                            class="fas fa-user-edit"></i> </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="userprofile.php">My Profile</a>
            </li>

            <li class="nav-item"><a class="nav-link" onclick="return confirm('Are you sure to exit ?')"
                                    href="userlogout.php">
                    Logout <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

</nav>
