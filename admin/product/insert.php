<?php

if (isset($_POST['SUBMIT'])) {
    include 'Config.php';
    $pname = $_POST['PNAME'];
    $pprice = $_POST['PPRICE'];
    $ptype = $_POST['PTYPE'];
    $pimage = $_FILES['PIMAGE'];
    $image_loc = $_FILES['PIMAGE']['tmp_name'];
    $image_name = $_FILES['PIMAGE']['name'];
    $img_des = "Uploadimage/" . $image_name;
    move_uploaded_file($image_loc, "Uploadimage/" . $image_name);

    // Insert into database

    mysqli_query($con, "INSERT INTO `product` (`PName`, `PPrice`, `PImage`, `PType`) 
                            VALUES ('$pname', '$pprice', '$img_des', '$ptype')");
}
header("Location: index.php");
exit();

?>

