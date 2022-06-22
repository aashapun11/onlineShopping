<?php
error_reporting(0);
include_once "connection.php";
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobileno = $_POST['mobile'];


    $select = "select * from user_signup where email='$email'";
    $userdata = mysqli_query($con, $select);
    if (mysqli_num_rows($userdata) == 0) {
        $insertQuery = "INSERT INTO `user_signup`(`password`, `email`, `fullname`, `mobile`) VALUES ('$password','$email','$fullname','$mobileno')";
        if (mysqli_query($con, $insertQuery)) {
            echo "<script>
        alert('signup success');
        window.location.href='userlogin.php';
        </script>";

        } else {
            echo "insert failed";
        }
    } else {
        echo "$username is already exist";
    }








