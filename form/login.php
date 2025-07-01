<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a5660b63e8.js" crossorigin="anonymous"></script>


</head>

<body class="bg-secondary vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-md-5 shadow m-auto border p-4 bg-light">


                <form action="login1.php" method="POST">

                    <div class="mb-3">

                        <p class="text-center fw-bold fs-3 text-grass">Login</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username or email:</label>
                        <input type="text" name="USER" class="form-control" placeholder="Enter your username or email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" name="USERPASS" class="form-control" placeholder="Enter your password">
                    </div>

                    <button class="bg-info fs-4 fw-bold my-3 form-control">Login</button>
                    <a href="register.php" class="text-decoration-none text-center d-block mt-3">Don't have an account? Register</a>
                </form>
            </div>
        </div>
    </div>




</body>

</html>