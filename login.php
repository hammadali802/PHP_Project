<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("./include/mysql_conn.php");
include("./include/global_vars.php");

if (!isset($_SESSION)) {
    session_start();
}

$email = $_POST['email'];
$pass = $_POST['password'];

echo $email . "<br>" . $pass . "<br>";

$sql = "SELECT * FROM Users WHERE email = '$email' AND password = '$pass' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION[LOGGED_IN_USER_ARR] = $row;

    $logged_user = $_SESSION[LOGGED_IN_USER_ARR];
    echo "From session variable: " . ($logged_user['email']);

    header("Location: " . ROOT_URL . "main_page.php");
} else {
    echo ("Wrong username or password");
}