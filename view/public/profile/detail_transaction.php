<?php
include_once("../../../config/database.php");

session_start();

if (!$_SESSION['isLoggedIn']) {
    header("location: ../../public/auth/login.php");
}

$transaksi_id = $_GET['id'];


$sql = "SELECT transaksi.id AS transaksi_id, transaksi.kode_transaksi AS kode_transaksi, transaksi.tanggal AS transaksi_tanggal, customer.id AS customer_id, customer.nama_lengkap AS customer_nama,customer.alamat_lengkap AS customer_alamat, transaksi_detail.jumlah AS transaksi_jumlah, produk.id AS produk_id, produk.nama_produk AS nama_produk,produk.gambar AS produk_gambar, produk.harga AS harga_produk 
FROM transaksi
JOIN customer ON transaksi.customer_id = customer.id
JOIN transaksi_detail ON transaksi_detail.transaksi_id = transaksi.id
JOIN produk ON produk.id = transaksi_detail.produk_id
WHERE transaksi.id = $transaksi_id ";

$stmt = $pdo->query($sql);
$transaksi = $stmt->fetchAll(PDO::FETCH_ASSOC);

$grandTotal = 0;
$subTotal = 0;

foreach ($transaksi as $value) {
    $subTotal = $value['harga_produk'] * $value['transaksi_jumlah'];
    $grandTotal += $subTotal;
}
?>

<?php
include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main container">


    <div class="detail-order">
        <div class="detail-header">
            <span>DETAIL USERS</span>
            <a href="profile.php" class="detail-button">Back</a>

        </div>
        <div>
            <table class="detail-table">

                <tr>
                    <td>NO INVOICE</td>
                    <td>:</td>
                    <td><?= $transaksi[0]['kode_transaksi'] ?></td>

                </tr>
                <tr>
                    <td>NAMA LENGKAP</td>
                    <td>:</td>
                    <td><?= $transaksi[0]['customer_nama'] ?></td>
                </tr>
                <tr>
                    <td>ALAMAT LENGKAP</td>
                    <td>:</td>
                    <td><?= $transaksi[0]['customer_alamat'] ?></td>
                </tr>
                <tr>
                    <td>TOTAL PEMBELIAN</td>
                    <td>:</td>
                    <td><?= moneyFormat($grandTotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="detail-order">
        <div class="detail-header">
            <span>DETAIL BARANG</span>
            <a href="profile.php" class="detail-button">Back</a>
        </div>
        <?php foreach ($transaksi as $value) : ?>
            <?php $subTotal = $value['harga_produk'] * $value['transaksi_jumlah']; ?>
            <div>
                <div class="detail-body">
                    <div class="content-wrapper">
                        <img src="<?= $value['produk_gambar'] ?>" alt="" width="200">
                        <div>
                            <h4><?= $value['nama_produk'] ?></h4>
                            <p>Jumlah : <?= $value['transaksi_jumlah'] ?></p>
                        </div>
                    </div>
                    <p><?= moneyFormat($subTotal) ?></p>
                </div>
            </div>
        <?php endforeach ?>

    </div>

</section>