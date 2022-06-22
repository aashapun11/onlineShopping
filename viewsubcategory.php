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
    <title>View Subcategory</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">

    <h2 class="text-center">View Subcategory</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>sr. no</th>
            <th>subcategoryName</th>
            <th>description</th>
            <th>categoryName</th>
            <th colspan="2">Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $srno= 1;
        include_once "connection.php";
        $selectDept = "select * from subcategory";
        $result = mysqli_query($con, $selectDept);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $srno; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><a href='editsubcategory.php?subcategoryName=<?php echo $row[1]; ?>&description=<?php echo $row[2]; ?>&categoryName=<?php echo $row[3]; ?>&subcategoryid=<?php echo $row[0]; ?>'
                       class='btn btn-warning'>
                        <i class='fas fa-edit'></i> Edit/update
                    </a></td>
                <td>
                    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="deletesubcategory.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="subcategoryid" value="<?php echo $row[0]; ?>" id="subcategoryid">
                        <button type="submit" class="btn btn-danger"><i
                                class='fas fa-trash-alt'></i> Delete</button>
                    </form>
                </td>
            </tr>
            <?php
            $srno++;

        }
        ?>
        </tbody>
    </table>
</div>
<?php
include_once "footer.php";
?>
</body>
    </html><?php


