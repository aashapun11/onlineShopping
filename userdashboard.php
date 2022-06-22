<?php
session_start();
error_reporting(0);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user panel</title>

    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>

<?php
include_once "userdashboardheader.php";
?>

<div class="container">
    <div class="jumbotron mt-5">
        <h2>Welcome <strong class="text-success"><?php echo $_SESSION['user_email']; ?></strong> to User Dashboard</h2>
    </div>
</div>

<div class="fixed-bottom">
    <?php
    include_once "footer.php";
    ?>
</div>

</body>
</html>l
