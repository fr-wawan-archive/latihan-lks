<?php
session_start();
include_once("../../../config/database.php");

if (isset($_GET['query'])) {
    $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%" . $_GET['query'] . "%'";
} else {
    $sql = "SELECT * FROM produk ";
}
$products = $pdo->query($sql);
?>

<?php

include_once("../../inc/header.php");
?>


<section class="search category container">

    <form>
        <div class="category-filter">
            <input type="text" class="search-input" name="query" placeholder="Search by products name...">
            <button type="submit" class="filter">Search</button>
        </div>
    </form>

    <section class="popular-products">
        <div class="popular-products-title">
            <h1>SEARCH <span>PRODUCTS</span></h1>
            <h5>Show All</h5>
        </div>
        <div class="card-wrapper">
            <?php foreach ($products as $product) : ?>
                <div class="card-products">
                    <img src="<?= $product['gambar'] ?>" alt="" />
                    <?php
                    $string = $product['nama_produk'];

                    $nama = mb_strimwidth($string, 0, 50, "...");
                    ?>
                    <h3><?= $nama ?></h3>
                    <div class="details-wrapper">
                        <div class="price">
                            <p><?= moneyFormat($product['harga']) ?></p>
                        </div>
                        <div class="button-products">
                            <a href="details_product.php?id=<?= $product['id'] ?>" class="button-details">Details</a>
                            <a href="../cart/insert_cart.php?id=<?= $product['id'] ?>" class="button-order">Order</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</section>