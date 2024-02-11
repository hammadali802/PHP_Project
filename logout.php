<?php
include("./include/global_vars.php");

if (!isset($_SESSION)) {
    session_start();
}

// unset($_SESSION[LOGGED_IN_USER_ARR]);

// // Unset all of the session variables.
// $_SESSION = array();

session_destroy();

header("Location: " . ROOT_URL . "main_page.php");