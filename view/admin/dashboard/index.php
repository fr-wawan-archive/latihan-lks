<?php
session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}
?>

<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main">
    <h1>DASH<span>BOARD</span></h1>
</section>