<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <style>
#checkout-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    border-radius: 50px;
    padding: 16px 36px;
    font-size: 1.25rem;
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}
</style>

</head>

<body>
    <?php
    include 'header.php';

    ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-info-emphasis">My Cart</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="fs-5">
                            <th>Item number</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php

                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $itemTotal = $value['productPrice'] * $value['productQuantity'];
                                    $total += $itemTotal;
                                    echo "
                                <tr>
                                    <form action='Insertcart.php' method='POST'>
                                        <td>$key</td>
                                        <td>{$value['productName']}</td>
                                        <td>{$value['productPrice']}</td>
                                        <td>
                                            <input type='number' name='Pquantity' value='{$value['productQuantity']}' min='1' class='form-control' style='width:80px;display:inline-block;'>
                                            <input type='hidden' name='PName' value='" . htmlspecialchars($value['productName']) . "'>
                                        </td>
                                        <td>$itemTotal</td>
                                        <td>
                                            <button type='submit' name='update' class='btn btn-success'>Update</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action='Insertcart.php' method='POST' style='display:inline;'>
                                            <input type='hidden' name='PName' value='" . htmlspecialchars($value['productName']) . "'>
                                            <button type='submit' name='remove' class='btn btn-danger'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                ";
                                }
                                echo "
                            <tr>
                                <td colspan='4' class='text-end'>Total:</td>
                                <td colspan='3' class= 'fw-bold'>$$total</td>
                                </tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <a href="checkout.php" class="btn btn-primary btn-lg" id="checkout-btn">Checkout</a>
<?php endif; ?>

</body>

</html>