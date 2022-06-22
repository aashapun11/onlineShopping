<?php
session_start();
$username = $password = $usernameError = $passwordError = "";
if (isset($_POST['loginAdmin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    include_once "connection.php";
    $selectcmd = "select * from admin where username='$username' ";
    $data = mysqli_query($con, $selectcmd);

    if (mysqli_num_rows($data) == 0) {
        $usernameError = "invalid Username";

    } else {

        $row = mysqli_fetch_assoc($data);
        if ($row['password'] == $password) {
            $_SESSION['admin_username'] = $username;
            header("location:adminhome.php");
        } else {
            $swordError = "Incorrect Password";
        }
//        print_r($row);

    }
}
?>


    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <?php
    include_once "headerfiles.php";
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body style="background-color: #a3a349;">
<?php
include_once "publicheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h2>Admin Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" required name="username" value="<?php echo $username; ?>" id="username"
                           class="form-control">
                    <?php
                    if ($usernameError != '') {
                        echo "<label class='error'>$usernameError</label>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" required name="password" id="password" class="form-control">
                    <?php
                    if ($passwordError != '') {
                        echo "<label class='error'>$passwordError</label>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="loginAdmin" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                </div>


            </form>
        </div>
    </div>

</div>


<?php
include_once "footer.php";
?>
</body>
    </html><?php
