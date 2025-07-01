<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="notification-container"></div>
<script>
function showNotification(message) {
    const container = document.getElementById('notification-container');
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerText = message;

    container.appendChild(notification);

    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => container.removeChild(notification), 300);
    }, 3000);
}
</script>
<?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
<script>
    showNotification("Product added to cart!");
</script>
<?php endif; ?>
</body>
</html>

