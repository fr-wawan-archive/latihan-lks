<?php
include_once("../../../config/database.php");

session_start();




$sql = "SELECT produk.id AS produk_id, produk.nama_produk AS nama_produk, COUNT(transaksi_detail.produk_id) AS jumlah_transaksi,produk.gambar AS produk_gambar,produk.harga AS produk_harga
FROM produk
JOIN transaksi_detail ON produk.id = transaksi_detail.produk_id
GROUP BY produk.id, produk.nama_produk
ORDER BY jumlah_transaksi DESC";
$products = $pdo->query($sql);


$sql = "SELECT * FROM produk ORDER BY harga DESC limit 8";
$newest = $pdo->query($sql);

$categories = $pdo->query("SELECT * FROM kategori");


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

    <form action="../kategori/index.php">
        <div class="category-filter">
            <select name="category" id="category">

                <?php foreach ($categories as $category) :  ?>
                    <option value="<?= $category['id'] ?>"><?= $category['nama_kategori'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="filter">Filter</button>
        </div>
</section>
</form>

<section class="popular-products container">
    <div class="popular-products-title">
        <h1>POPULAR <span>PRODUCTS</span></h1>
        <h5>Show All</h5>
    </div>
    <div class="card-wrapper">
        <?php foreach ($products as $product) : ?>
            <div class="card-products">
                <div class="card-header">
                    <img src="<?= $product['produk_gambar'] ?>" alt="" />
                </div>
                <div class="card-body">
                    <?php
                    $string = $product['nama_produk'];

                    $nama = mb_strimwidth($string, 0, 50, "...");
                    ?>
                    <h3><?= $nama ?></h3>
                    <p><?= moneyFormat($product['produk_harga']) ?></p>
                    <div class="button-products">
                        <a href="details_product.php?id=<?= $product['produk_id'] ?>" class="button-details">Details</a>
                        <a href="../cart/insert_cart.php?id=<?= $product['produk_id'] ?>" class="button-order">Order</a>
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

<div class="ads"></div>


<?php
include_once("../../inc/footer.php");
?>