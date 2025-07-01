<?php
include 'Config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Delete the product from the database
    mysqli_query($con, "DELETE FROM `product` WHERE `ID` = $id");
}

header("Location: index.php");
exit();
