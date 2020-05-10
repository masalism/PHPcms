<?php 
function logOut() {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
    header("Location: " . DIRADMIN . "login.php");
}

