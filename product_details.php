<?php
include 'Config.php';
include 'header.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT * FROM product WHERE ID = $id");
    $product = mysqli_fetch_assoc($query);
    if (!$product) {
        echo "<h2>Product not found.</h2>";
        exit;
    }
} else {
    echo "<h2>No product selected.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($product['PName']); ?> - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <img src="admin/product/<?php echo htmlspecialchars($product['PImage']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['PName']); ?>">
        </div>
        <div class="col-md-7">
            <h2><?php echo htmlspecialchars($product['PName']); ?></h2>
            <h4 class="text-success">$<?php echo htmlspecialchars($product['PPrice']); ?></h4>
            <p>
                <?php
                // If you have a description column, use it. Otherwise, show a placeholder.
                echo isset($product['PDesc']) ? htmlspecialchars($product['PDesc']) : "No description available.";
                ?>
            </p>
            <form method="post" action="Insertcart.php">
                <input type="hidden" name="PName" value="<?php echo htmlspecialchars($product['PName']); ?>">
                <input type="hidden" name="PPrice" value="<?php echo htmlspecialchars($product['PPrice']); ?>">
                <div class="mb-3">
                    <label for="Pquantity" class="form-label">Quantity:</label>
                    <input type="number" name="Pquantity" id="Pquantity" class="form-control" value="1" min="1" max="99" required>
                </div>
                <button type="submit" name="addCart" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>