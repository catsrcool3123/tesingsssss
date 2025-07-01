<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <?php
    include 'header.php';
    ?>

    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            height: 150px;
        }

        #notification-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .notification {
            background-color: #28a745;
            color: white;
            padding: 12px 18px;
            margin-top: 10px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            opacity: 1;
            transition: opacity 0.3s ease;
            font-family: Arial, sans-serif;
        }
    </style>
    </style>
</head>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">


            <body>

                <h1 class="my-3 text-info-emphasis">Home</h1>
                <?php
                include 'Config.php';

                $search = isset($_GET['search']) ? trim($_GET['search']) : '';
                $selectedType = isset($_GET['type']) ? $_GET['type'] : '';

                if ($search !== '') {

                    $searchLike = '%' . $search . '%';
                    $sql = "SELECT * FROM product WHERE PName LIKE ? OR PDesc LIKE ?";
                    if ($selectedType) {
                        $sql .= " AND PType = ?";
                    }
                    $stmt = mysqli_prepare($con, $sql);
                    if ($selectedType) {
                        mysqli_stmt_bind_param($stmt, "sss", $searchLike, $searchLike, $selectedType);
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $searchLike, $searchLike);
                    }
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                } else if ($selectedType) {
                    $stmt = mysqli_prepare($con, "SELECT * FROM product WHERE PType = ?");
                    mysqli_stmt_bind_param($stmt, "s", $selectedType);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                } else {
                    $result = mysqli_query($con, "SELECT * FROM product");
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                            <div class='col-6 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex'>

                                <div class='card' style='width: 18rem;'>
                                    <a href='product_details.php?id={$row['ID']}' class='text-decoration-none text-dark'>    
                                        <img src='../admin/product/{$row['PImage']}' class='card-img-top'>    
                                    </a>
                                    
                                    <form action='Insertcart.php' method='POST'>

                                        <div class='card-body'>
                                            <h5 class='card-title'>{$row['PName']}</h5>

                                            
                                            <input type='hidden' name='PName' value='{$row['PName']}'>

                                            <input type='hidden' name='PPrice' value='{$row['PPrice']}'>

                                            <input type='hidden' name='Pquantity' value='1'>
                                            <p class='card-text'>Price: \${$row['PPrice']}</p>
                                            <input type='submit' name='addCart' class='btn btn-primary' value='Add to Cart'>

                                        </div>
                                    </form>
                                </div>
                            
                            </div>
                      ";
                }
                ?>
        </div>
    </div>
</div>
<!-- Notification container -->
<div id="notification-container"></div>

<!-- Notification script -->
<script>
    function showNotification(message) {
        const container = document.getElementById('notification-container');
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerText = message;

        container.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => container.removeChild(notification), 300);
        }, 3000);
    }
</script>

<!-- Trigger if product was added -->
<?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
    <script>
        showNotification("Product added to cart!");
    </script>
<?php endif; ?>
</body>

</html>