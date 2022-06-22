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
    <title>My Profile</title>
    <?php
    include_once "headerfiles.php";
    ?>
    <style type="text/css">
        .wrapper
        {
            width: 400px;
            margin: 0 auto;
            background-color: #9fcdff;
        }
    </style>
</head>
<body>
<?php
error_reporting(0);
include_once "userdashboardheader.php";
?>
<div class="wrapper"
<h2 style="text-align: center;">My Profile</h2>

<?php
error_reporting(0);
include_once "connection.php";
$selectDept = "select * from user_signup where email='$_SESSION[user_email]'";
$result = mysqli_query($con, $selectDept);
$row = mysqli_fetch_assoc($result) ;

?>

<table >
    <tr>
        <td>Fullname</td>
        <td><input readonly type='text' name='fullname'  id='fullname' value="<?php echo $row['fullname']; ?>" style="background-color: #b3b7bb"></td>
    </tr>
    <tr>
        <td>Mobile number</td>
        <td><input readonly type='number' name='mobilen'  id='mobilen' value="<?php echo $row['mobile']; ?>" style="background-color: #b3b7bb"></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><input readonly type='email' name='email'  id='email' value="<?php echo $row['email']; ?>" style="background-color: #b3b7bb"></td>
    </tr>

</table>
</div>
</body>
    </html>
