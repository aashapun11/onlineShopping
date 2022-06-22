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
    <title>View Products</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">

    <h2 class="text-center">View Products</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Sr.&nbsp;No.</th>
            <th>Product&nbsp;Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Stock</th>
            <th>Photo</th>
            <th>Description</th>
            <th class="text-center" colspan="4">Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $srno = 1;
        include_once "connection.php";
        $selectDept = "select * from products";
        $result = mysqli_query($con, $selectDept);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $srno; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>

                <td>
                    <img src="<?php echo $row[5]; ?>" style="width: 50px;height: 50px" alt="">
                </td>

                <td><?php echo $row[6]; ?></td>

                <td>
                    <a href='editproduct.php?pid=<?php echo $row[0]; ?>' class='btn btn-warning btn-sm'>
                        <i class='fas fa-edit'></i> Edit/update
                    </a>
                </td>

                <td>
                    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="deleteproduct.php"
                          method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="productid" value="<?php echo $row[0]; ?>" id="productid">
                        <button type="submit" class="btn btn-danger btn-sm"><i
                                    class='fas fa-trash-alt'></i> Delete
                        </button>
                    </form>
                </td>

                <td>
                    <a href='addphoto.php?id=<?php echo $row[0]; ?>' class='btn btn-primary btn-sm'>
                        <i class='fas fa-edit'></i> Add&nbsp;photo
                    </a>
                </td>


                <td>
                    <a href='viewphoto.php?id=<?php echo $row[0]; ?>' class='btn btn-warning btn-sm'>
                        <i class='fas fa-edit'></i> View&nbsp;photo
                    </a>
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
</html>
