<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uersignup</title>
    <?php
    include_once "headerfiles.php";
    ?>

</head>
<body>
<?php
include_once "publicheader.php";
?>
<div class="container">
    <form action="usersignupaction.php" id="usersignup" method="post" >
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" data-rule-required="true"  data-msg-required="Please Enter Email" data-msg-email="Invalid Email id" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" data-rule-required="true" name="fullname" id="fullname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" data-rule-required="true"  minlength="8"  name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" data-rule-required="true" data-msg-equalto="Password & Confirm Password Not Match" data-rule-equalto="#password" name="confirmpassword" id="confirmpassword" class="form-control">
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile No</label>
                    <input type="text" data-rule-required="true" data-rule-number="true" minlength="10" maxlength="10" name="mobile" id="mobile" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" value="signup" class="btn btn-primary">
                </div>
            </div>

        </div>
    </form>
</div>
<?php
include_once "footer.php";
?>
<script>
    $(document).ready(function () {
        // $('#usersignup').validate();
        // $('.classname').validate();
        $('form').validate();

    })

</script>
</body>
</html>
