<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a5660b63e8.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    session_start();
    ?>
    <nav class="navbar" style="background-color: #d9d9d9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="" style="height:50px; width:auto;">
            </a>

            <form class="d-flex mx-auto" role="search" style="max-width: 800px; width: 100%;" method="GET" action="index.php">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <span>
                <i class="fa fa-user"></i> Hello,
                <?php
                if (isset($_SESSION['Username'])) {
                    echo $_SESSION['Username'];
                    echo "
                    | <a href='viewCart.php' class='text-decoration-none ms-3 me-2'>
                    <i class='fas fa-shopping-cart'></i>Cart</a>
                    | <a href='../user/form/logout.php' class='text-decoration-none me-2 ms-2'>Logout</a> | 
                    ";
                } else {
                    echo "Guest
                    | <a href='viewCart.php' class='text-decoration-none ms-3 me-2'> 
                    <i class='fas fa-shopping-cart'></i>Cart</a>
                    | <a href='../user/form/login.php' class='text-decoration-none me-2 ms-2'>Login</a> |";
                }
                ?>


            </span>
        </div>
    </nav>
    <div class="bg-secondary">
        <ul class="list-unstyled d-flex justify-content-center flex-wrap ">
            <li>
                <a href="index.php?type=fruit" class="text-white fs-10 px-5 fw-bold text-decoration-none">FRUITS</a>
            </li>
            <li>
                <a href="index.php?type=soda" class="text-white fs-10 px-5 fw-bold text-decoration-none">SODAS</a>
            </li>
            <li>
                <a href="index.php?type=drinks" class="text-white fs-10 px-5 fw-bold text-decoration-none">DRINKS</a>
            </li>
            <li>
                <a href="index.php?type=dairy" class="text-white fs-10 px-5 fw-bold text-decoration-none">DAIRY</a>
            </li>
            <li>
                <a href="index.php?type=vegetable" class="text-white fs-10 px-5 fw-bold text-decoration-none">VEGETABLES</a>
            </li>

        </ul>
    </div>
</body>

</html>