<?php


$con = mysqli_connect('localhost', 'root', '', 'project');

$name = $_POST['USER'];
$password = $_POST['USERPASS'];

$query = mysqli_query($con, "SELECT * FROM `users` WHERE (`Username` = '$name' OR `Email` = '$name') AND `Password` = '$password'");



if (mysqli_num_rows($query)) {
    session_start();
    $_SESSION['Username']=$name; 
    $_SESSION['cart']=array();  

    echo "
    <script>
     alert('Login Successful');
        window.location.href = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
     alert('Incorrect username or password');
        window.location.href = 'login.php';
    </script>
    ";
}

