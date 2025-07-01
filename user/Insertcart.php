<?php

session_start();

if (isset($_POST['addCart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $product_name = $_POST['PName'];
    $product_price = $_POST['PPrice'];
    $product_quantity = intval($_POST['Pquantity']);

    $found = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productName'] === $product_name) {
            $_SESSION['cart'][$key]['productQuantity'] += $product_quantity;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $_SESSION['cart'][] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity
        );
    }
    header('location:index.php?added=1');
    exit;
}

if (isset($_POST['remove']))
{
    $product_name = $_POST['PName'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $product_name) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values( $_SESSION['cart']); // Re-index the array
            header("Location: viewCart.php");
        }
    }
}

if (isset($_POST['update'])) {
    $product_name = $_POST['PName'];
    $product_quantity = intval($_POST['Pquantity']);
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $product_name) {
            $_SESSION['cart'][$key]['productQuantity'] = $product_quantity;
            break;
        }
    }
    header("Location: viewCart.php");
    exit;
}
?>
