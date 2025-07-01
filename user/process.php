<?php
include 'Config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $location = $_POST['location'];

    // Build the receipt
    $subject = "Your Order Receipt";
    $message = "Thank you for your purchase!\n\n";
    $message .= "Delivery Location: $location\n\n";
    $message .= "Items Purchased:\n";
    $total = 0;

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
            $name = $item['productName'];
            $price = number_format($item['productPrice'], 2);
            $qty = $item['productQuantity'];
            $itemTotal = $item['productPrice'] * $qty;
            $total += $itemTotal;
            $message .= "- $name (x$qty) @ $$price each: $" . number_format($itemTotal, 2) . "\n";
        }
        $message .= "\nTotal Amount: $" . number_format($total, 2) . "\n";
    } else {
        $message .= "No items in cart.\n";
    }

    $headers = "From: noreply@yourdomain.com\r\n";

    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        echo "<script>alert('Payment successful! A receipt has been sent to your email.');window.location.href='index.php';</script>";
        // Optionally clear the cart
        unset($_SESSION['cart']);
    } else {
        echo "<script>alert('Payment processed, but failed to send email.');window.location.href='index.php';</script>";
    }
}
?>