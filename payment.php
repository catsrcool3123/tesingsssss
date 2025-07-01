<?php
include 'header.php';
include 'Config.php';

$userEmail = '';
if (isset($_SESSION['Username'])) {
    $login = mysqli_real_escape_string($con, $_SESSION['Username']);
    $query = mysqli_query($con, "SELECT Email FROM users WHERE Username = '$login' OR Email = '$login' LIMIT 1");
    if ($row = mysqli_fetch_assoc($query)) {
        $userEmail = $row['Email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .accordion-button:not(.collapsed) {
            color: #fff;
            background-color:rgb(46, 100, 130);
        }
        .checkout__input, .form-control {
            margin-bottom: 1rem;
        }
        .checkout__item1, .checkout__item2 {
            margin-bottom: 2rem;
        }
        .button__cart, .btn-success {
            min-width: 120px;
        }
        .breadcrumbs__list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 0.5rem;
        }
        .breadcrumbs__list .breadcrumbs {
            color: #6c757d;
            text-decoration: none;
        }
        .breadcrumbs__list .current {
            color: #198754;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="accordion" id="checkoutAccordion">
        <!-- Account Information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
 01. Account Information
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checkoutAccordion">
        <div class="accordion-body">
            <?php if (isset($_SESSION['Username'])): ?>
                <div class="alert alert-success mb-4">
                    <strong>Account Information</strong><br>
                    <span><b>Username:</b> <?php echo htmlspecialchars($_SESSION['Username']); ?></span><br>
                    <span><b>Email:</b> <?php echo htmlspecialchars($userEmail); ?></span>
                </div>
            <?php else: ?>
                <div class="alert alert-warning mb-4">
                    <strong>You are shopping as a guest.</strong><br>
                    <span>Please <a href="form/login.php" class="alert-link">log in</a> or <a href="form/register.php" class="alert-link">register</a> for a better experience.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
        <!-- Billing Information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    02. Billing Information
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <form>
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your full name" required>
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your address" required>
                        <label class="form-label">City</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your city" required>
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your country" required>
                    </form>
                </div>
            </div>
        </div>
        <!-- Shipping Information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    03. Shipping Information
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <form>
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your full name" required>
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your address" required>
                        <label class="form-label">City</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your city" required>
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control checkout__input" placeholder="Enter your country" required>
                    </form>
                </div>
            </div>
        </div>
        <!-- Payment Information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    04. Payment Information
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <form action="process.php" method="POST">
                        <div class="mb-3">
                            <label for="location" class="form-label">Delivery Location</label>
                            <input type="text" class="form-control" id="location" name="location" required placeholder="Enter your delivery address">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                required 
                                value="<?php echo htmlspecialchars($userEmail); ?>"
                                placeholder="Enter your email"
                                required
                            />
                        </div>
                        <button type="submit"class="btn btn-success w-100">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>