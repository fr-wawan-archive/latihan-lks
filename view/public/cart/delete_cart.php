<?php
include_once "../../../config/database.php";
session_start();
if (!$_SESSION['isLoggedIn']) {
    header("location: ../../public/auth/login.php");
}

$id = $_GET['id'];
unset($_SESSION["cart"][$id]);


header("location:index.php");
