<?php
include_once("../../../config/function.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Commerce</title>
    <link rel="stylesheet" href="../../../dist/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar">
            <h1>MY STORE</h1>
            <ul>
                <li>
                    <a href="../../public/home/index.php" class="active">HOME</a>
                </li>
                <li>
                    <a href="">NEWEST</a>
                </li>
                <li>
                    <a href="category-page.html">CATEGORY</a>
                </li>
            </ul>
            <div class="navbar-right">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
                <a href="cart.html">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                </a>

                <?php
                if (!isset($_SESSION['isLoggedIn'])) {
                ?>
                    <div class="sign-in">
                        <p>Sign In</p>
                        <svg width="28" height="28" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6667 2.66669H37.3334V37.3334H18.6667V34.6667H34.6667V5.33335H18.6667V2.66669ZM20.944 11.056L29.8507 19.9627L20.9787 29.5707L19.0214 27.7627L24.9547 21.3334H2.66669V18.6667H24.7814L19.056 12.944L20.944 11.056Z" fill="black" />
                        </svg>
                    </div>
                <?php } else { ?>
                    <a href="../../public/auth/logout.php">Logout</a>
                <?php } ?>
            </div>
        </nav>
    </header>