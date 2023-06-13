<?php
include_once("../../../config/database.php");

session_start();


$sql = "SELECT * FROM produk ORDER BY harga DESC";
$products = $pdo->query($sql);

$sql = "SELECT * FROM produk ORDER BY nama_produk DESC";
$newest = $pdo->query($sql);

?>

<?php
include_once("../../inc/header.php");
?>

<section class="hero">
    <div class="hero-text">
        <h1>Best Product And Best Sales</h1>
        <p>Lorem ipsum dolor sit amet.</p>
    </div>
</section>

<section class="category container">
    <h1>CATEGORY <span>PRODUCTS</span></h1>

    <div class="card-wrapper">

        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
    </div>
</section>

<section class="popular-products container">
    <div class="popular-products-title">
        <h1>POPULAR <span>PRODUCTS</span></h1>
        <h5>Show All</h5>
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

<section class="popular-products container">
    <div class="popular-products-title">
        <h1>NEWEST <span>PRODUCTS</span></h1>
        <h5>Show All</h5>
    </div>
    <div class="card-wrapper">
        <?php foreach ($newest as $product) :  ?>
            <div class="card-products">
                <div class="card-header">
                    <img src="<?= $product['gambar'] ?>" alt="" />
                </div>
                <div class="card-body">
                    <h3><?= $product['nama_produk'] ?></h3>
                    <p><?= moneyFormat($product['harga']) ?></p>

                    <div class="button-products">
                        <a href="" class="button-details">Details</a>
                        <a href="" class="button-order">Order</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<div class="ads"></div>


<?php
include_once("../../inc/footer.php");
?>