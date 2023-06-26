<?php
include_once("../../../config/database.php");

session_start();

$category_id = $_GET['category'];

$sql = "SELECT * FROM produk WHERE kategori_id=$category_id";
$products = $pdo->query($sql);
?>

<?php
include_once("../../inc/header.php");
?>

<section class="popular-products container">
    <div class="popular-products-title">
        <h1> PRODUCTS</h1>
    </div>
    <div class="card-wrapper">
        <?php foreach ($products as $product) : ?>
            <div class="card-products">
                <div class="card-header">
                    <img src="<?= $product['gambar'] ?>" alt="" />
                </div>
                <div class="card-body">
                    <h3><?= $product['nama_produk'] ?></h3>
                    <p><?= moneyFormat($product['harga']) ?></p>
                    <div class="button-products">
                        <a href="details_product.php?id=<?= $product['id'] ?>" class="button-details">Details</a>
                        <a href="../cart/insert_cart.php?id=<?= $product['id'] ?>" class="button-order">Order</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
include_once("../../inc/footer.php");
?>