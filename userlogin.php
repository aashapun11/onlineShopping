<?php
session_start();
$email = $password = $emailError = $passwordError = "";
if (isset($_POST['loginUser'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    include_once "connection.php";
    $selectcmd = "select * from user_signup where email='$email' ";
    $data = mysqli_query($con, $selectcmd);

    if (mysqli_num_rows($data) == 0) {
        $emailError = "invalid email";

    } else {

        $row = mysqli_fetch_assoc($data);
        if ($row['password'] == $password) {
            $_SESSION['user_email'] = $email;
            header("location:userdashboard.php");
        } else {
            $swordError = "Incorrect Password";
        }

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
    <title>User Login</title>
    <?php
    include_once "headerfiles.php";
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
include_once "publicheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h2>User Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" required name="email" value="<?php echo $email; ?>" id="email"
                           class="form-control">
                    <?php
                    if ($emailError != '') {
                        echo "<label class='error'>$emailError</label>";
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
                    <button type="submit" name="loginUser" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
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
