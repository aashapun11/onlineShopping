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
    <title>Admin panel</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <div class="jumbotron mt-5 text-center">
        <h2>Welcome <strong class="text-success"><?php echo $_SESSION['admin_username']; ?></strong> to Admin Panel</h2>
    </div>
</div>
<?php
include_once "footer.php";
?>
</body>
</html>
