<?php
include_once("../../../config/database.php");




?>
<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <h1>LIST <span>TRANSAKSI</span></h1>
    <table id="customers">
        <tr>
            <th>Invoice</th>
            <th>Nama Customer</th>
            <th>Tanggal Transaksi</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>

        <!-- <?php foreach ($rows as $row) : ?> -->
        <tr>
            <!-- <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['nama_kategori'] ?></td>
                <td><?= $row['harga'] ?></td>
                </td>
                <td class="actions">
                    <a href="edit_product.php?id=<?= $row['produk_id'] ?>">Edit</a>
                    <a href="delete_product.php?id=<?= $row['produk_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td> -->
        </tr>
        <!-- <?php endforeach ?> -->

    </table>
</section>