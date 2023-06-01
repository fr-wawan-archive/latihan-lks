<?php
include_once("../../../config/database.php");

$no = 1;
$sql = "SELECT * FROM produk";
$stmt = $pdo->query($sql);

?>
<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <a href="create_product.php" class="create-button">Create Produk</a>
    <h1>LIST <span>CATEGORY</span></h1>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($stmt as $row) : ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row['nama_kategori'] ?></td>
                </td>
                <td class="actions">
                    <a href="edit_category.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete_category.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</section>