<?php


$con = mysqli_connect('localhost', 'root', '', 'project');


$A_name = $_POST['USER'];
$A_pass = $_POST['USERPASS'];

$query = mysqli_query($con, "SELECT * FROM `admin` WHERE `username` = '$A_name' AND `userpass` = '$A_pass'");

session_start();

if (mysqli_num_rows($query)) {

    $_SESSION['username'] = $A_name;

    echo "
    <script>
     alert('Login Successful');
        window.location.href = '../mystore.php';
    </script>
    ";
} else {
    echo "
    <script>
     alert('Login Failed');
        window.location.href = 'login.php';
    </script>
    ";
}
