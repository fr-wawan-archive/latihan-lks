<?php
include_once("../../../config/database.php");

session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}

$no = 1;


if (isset($_GET['query'])) {
    $sql = "SELECT transaksi.id as transaksi_id,transaksi.kode_transaksi AS kode_transaksi,transaksi.tanggal AS transaksi_tanggal,customer.id AS customer_id,customer.nama_lengkap AS customer_nama FROM transaksi JOIN customer ON transaksi.customer_id = customer.id WHERE transaksi.kode_transaksi LIKE '%" . $_GET['query'] . "%'";
} else {
    $sql = "SELECT transaksi.id as transaksi_id,transaksi.kode_transaksi AS kode_transaksi,transaksi.tanggal AS transaksi_tanggal,customer.id AS customer_id,customer.nama_lengkap AS customer_nama FROM transaksi JOIN customer ON transaksi.customer_id = customer.id";
}
$stmt = $pdo->query($sql);

?>
<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <div class="main-header">
        <h1>LIST <span>TRANSAKSI</span></h1>
        <form action="">
            <input type="text" placeholder="Search Berdasarkan Invoice" name="query">
        </form>
    </div>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Invoice</th>
            <th>Nama Customer</th>
            <th>Tanggal Transaksi</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($stmt as $row) : ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row['kode_transaksi'] ?></td>
                <td><?= $row['customer_nama'] ?></td>
                <td><?= $row['transaksi_tanggal'] ?></td>
                <td>
                    <a href="detail_transaction.php?id=<?= $row['transaksi_id'] ?>" class="detail-button">
                        View
                    </a>
                </td>

            </tr>
        <?php endforeach ?>

    </table>
</section>