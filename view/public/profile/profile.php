<?php
session_start();
$user_id = $_SESSION['id'];
include_once("../../../config/database.php");

if (!$_SESSION['isLoggedIn']) {
    header("location: ../../public/auth/login.php");
}

$sql = "SELECT transaksi.id as transaksi_id,transaksi.kode_transaksi AS kode_transaksi,transaksi.tanggal AS transaksi_tanggal,customer.id AS customer_id,customer.nama_lengkap AS customer_nama FROM transaksi JOIN customer ON transaksi.customer_id = customer.id WHERE transaksi.customer_id = $user_id ORDER BY transaksi.id DESC";
$no = 1;
$stmt = $pdo->query($sql);



?>

<?php
include_once("../../inc/header.php");
?>

<section class="main container table-section">
    <div class="transaction-card">
        <h1>LIST <span>TRANSAKSI</span></h1>
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
    </div>
</section>