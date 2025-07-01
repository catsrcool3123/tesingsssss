<?php
$con = mysqli_connect('localhost', 'root', '', 'project');

if (isset($_POST['REGISTER'])) {
    $name = $_POST['USER'];
    $email = $_POST['EMAIL'];
    $pass = $_POST['USERPASS'];
    $con = mysqli_connect('localhost', 'root', '', 'project');

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
        <script>
        alert('Please enter a valid email address');
        window.location.href = 'register.php';
        </script>";
        exit;
    }

    $Duplicate_email = mysqli_query($con, "SELECT * FROM `users` WHERE Email = '$email'");
    $Duplicate_user = mysqli_query($con, "SELECT * FROM `users` WHERE Username = '$name'");

    if (mysqli_num_rows($Duplicate_email)) {
        echo "
        <script>
        alert('Email already in use');
        window.location.href = 'register.php';
        </script>";
        exit;
    }
    elseif (mysqli_num_rows($Duplicate_user)) {
        echo "
        <script>
        alert('Username already in use');
        window.location.href = 'register.php';
        </script>";
        exit;
    } else {
        mysqli_query($con, "INSERT INTO `users` (`Username`, `Email`, `Password`) VALUES ('$name', '$email', '$pass')");
        echo "
            <script>
            alert('Registration successful');
        window.location.href = 'login.php';
            </script>";
        exit;
    }
}
