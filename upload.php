<?php
//print_r($_FILES['photo']);
$temp_path = $_FILES['photo']['tmp_name'];
echo $temp_path, '<br>';
$org_path = $_FILES['photo']['name'];
echo $org_path, '<br>';

$filesize=round( $_FILES['photo']['size']/1024,2);

$ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
echo $ext;

if ($ext != "jpg" && $ext != "png") {
    echo "please select jpg or png file only";

}
elseif ($filesize >20)
{
    echo "Image Size must be Less than or equal to 20 KB";
}
else {
    move_uploaded_file($temp_path, "uploads/$org_path");
    echo "<img src='uploads/$org_path'>";
}

