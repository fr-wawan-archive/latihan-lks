<?php
include_once("../../../config/database.php");

session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}

$no = 1;
$sql = "SELECT produk.id AS produk_id, produk.nama_produk AS nama_produk, kategori.id AS kategori_id, kategori.nama_kategori AS nama_kategori ,produk.harga AS harga FROM produk JOIN kategori ON produk.kategori_id = kategori.id";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <a href="create_product.php" class="create-button">Create Produk</a>
    <h1>LIST <span>PRODUK</span></h1>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($rows as $row) : ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['nama_kategori'] ?></td>
                <td><?= $row['harga'] ?></td>
                </td>
                <td class="actions">
                    <a href="edit_product.php?id=<?= $row['produk_id'] ?>">Edit</a>
                    <a href="delete_product.php?id=<?= $row['produk_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</section>