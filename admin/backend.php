<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "eshop");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);

$numrows = mysqli_num_rows($result);

if($numrows > 0) {
    $array = mysqli_fetch_array($result);
    if($array['password'] == $password) {
        $_SESSION['username'] = $array['username'];
        $_SESSION['password'] = $array['password'];
        header("location: upload-product.php");
    }else{
        header("location: login.php?error=invalid_password");
    }
}else{
    header("location: login.php?error=invalid_username");
}