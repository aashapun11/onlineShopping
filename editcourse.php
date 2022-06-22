 <?php
session_start();
?>
<?php
include_once "connection.php";
//if (isset($_GET['courseid'])) {
//if (isset($_GET['categoryName'])) {

//    $courseid = $_GET['courseid'];
//    $categoryName = $_GET['categoryName'];
//    $selectCourse = "select * from courses where courseid='$courseid'";
//    $selectCourse = "select * from `category` where categoryName='$categoryName'";

//    $coursData = mysqli_query($con, $selectCourse);
//    $rowcourse = mysqli_fetch_assoc($coursData);
//    if($rowcourse){
//        header("location:viewcategory.php");
//    }else{
//        echo "update failed";
//    }
//}
//?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <h2>Edit Category</h2>
<!--    <form action="managecourses.php" method="post">-->
<!--        <div class="form-group">-->
<!--            <label for="deptname">Department</label>-->
<!--            <select required name="deptname" id="deptname" class="form-control">-->
<!--                <option value="">Select Department</option>-->
<!--                --><?php
//                error_reporting(0);
//                $selectDepts = "select * from category";
//                $deptData = mysqli_query($con, $selectDepts);
//                while ($rowdept = mysqli_fetch_assoc($deptData)) {
//
//                    ?>
<!--                    <option --><?php //if ($rowdept['deptname'] == $rowcourse['deptname']) {
//                        echo 'selected';
//                    } ?><!-- value="--><?php //echo $rowdept['deptname'] ?><!--">--><?php //echo $rowdept['deptname'] ?><!--</option>-->
<!--                    --><?php
//                }
//                ?>
<!--            </select>-->
<!--        </div>-->
        <div class="form-group">
            <label for="categoryName">categoryName</label>
            <input type="text" name="categoryName" value="<?php echo $rowcourse['categoryName'] ?>" id="categoryName" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" value="<?php echo $rowcourse['description'] ?>" id="description" class="form-control">
        </div>

        <div class="form-group">
            <input type="hidden" name="action" value="update" id="action">
            <input type="hidden" name="categoryName" value="<?php echo $categoryName; ?>">
            <input type="submit" value="Save" class="btn btn-success">
        </div>
    </form>
</div>
<?php
include_once "footer.php";
?>
</body>
    </html>

