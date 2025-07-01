<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <?php
    include 'header.php';
    include 'Config.php';
    ?>
    <div class="container mt-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-4">Checkout Summary</h2>
        <a href="payment.php" class="btn btn-success btn-lg">Proceed to Payment</a>
    </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <tr class="table-info">
            <th colspan="4" class="text-end">Total Cost of All Items:</th>
            <th>
                <?php
                // Calculate grand total before the table
                $grandTotal = 0;
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach ($_SESSION['cart'] as $item) {
                        $grandTotal += $item['productPrice'] * $item['productQuantity'];
                    }
                }
                echo "$" . number_format($grandTotal, 2);
                ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                $pname = mysqli_real_escape_string($con, $item['productName']);
                $imgQuery = mysqli_query($con, "SELECT PImage FROM product WHERE PName = '$pname' LIMIT 1");
                $imgRow = mysqli_fetch_assoc($imgQuery);
                $imgSrc = $imgRow ? "../admin/product/" . htmlspecialchars($imgRow['PImage']) : "no-image.png";

                $unitPrice = $item['productPrice'];
                $quantity = $item['productQuantity'];
                $total = $unitPrice * $quantity;
                echo "<tr>
                    <td><img src='$imgSrc' alt='".htmlspecialchars($item['productName'])."' style='height:80px;max-width:100px;object-fit:cover;'></td>
                    <td>".htmlspecialchars($item['productName'])."</td>
                    <td>$".number_format($unitPrice, 2)."</td>
                    <td>$quantity</td>
                    <td>$".number_format($total, 2)."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
        }
        ?>
    </tbody>
</table>
        </div>
    </div>
</body>
</html>