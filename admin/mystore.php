<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/a5660b63e8.js" crossorigin="anonymous"></script>

  <?php
  session_start();
  if (!$_SESSION['username']) {
    header("Location: form/login.php");
  }

  ?>


</head>

<body>


  <nav class="navbar navbar-light bg-dark">
    <div class="container-fluid text-white">
      <a class="navbar-brand text-white">
        <h1>Store</h1>
      </a>
      <span>


        <i class="fa fa-user-shield" aria-hidden="true"></i> 
        Hello, <?php echo $_SESSION['username']; ?> |
        <a href="form/logout.php" class="text-decoration-none">Logout</a>
        <i class="fa fa-sign-out" aria-hidden="true"></i> |
        <a href="" class="text-decoration-none">User panel</a> |
      </span>

    </div>
  </nav>

  <div>
    <h2 class="text-center">Dashboard</h2>
  </div>
  <div class="col-md-6 bg-secondary text-center m-auto">
    <a href="products.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Products</a>
    <a href="product/index.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Add Product</a>
    <a href="user.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Users</a>
  </div>

  
</body>

</html>