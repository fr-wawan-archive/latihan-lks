<?php
include_once("../../../config/database.php");
session_start();

$produk_id = $_GET['id'];

$sql = "SELECT * FROM produk where id = $produk_id";
$stmt = $pdo->query($sql);

while ($rows = $stmt->fetch()) {
    $produk = $rows;
}


?>

<?php
include_once("../../inc/header.php");
?>

<section class="product-details container">
    <div>
        <img src="<?= $produk['gambar'] ?>" alt="" width="500">
    </div>
    <div class="details-body">
        <h1><?= $produk['nama_produk'] ?></h1>
        <span><?= moneyFormat($produk['harga']) ?></span>
        <p><?= $produk['deskripsi'] ?></p>
        <div class="details-button">
            <div class="quantity-button">
                <button>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                    </svg>
                </button>
                <input type="number" value="1" />
                <button>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                    </svg>
                </button>
            </div>

            <a href="" class="">Order</a>

        </div>
    </div>
</section>


<?php
include_once("../../inc/footer.php");
?>