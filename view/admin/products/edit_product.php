<?php

include_once("../../../config/database.php");

$produk_id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id = $produk_id";
$stmt = $pdo->query($sql);

while ($rows = $stmt->fetch()) {
    $produk = $rows;
}

$sql_kategori = "SELECT * FROM kategori";
$category = $pdo->query($sql_kategori);

if (isset($_POST['submit'])) {
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $price = htmlspecialchars($_POST['harga']);
    $category_id = htmlspecialchars($_POST['kategori_id']);
    $description = htmlspecialchars($_POST['deskripsi']);

    $target_dir = "../../images/products/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_file_ext = ["jpg", "jpeg", "png"];


    $errors = [];

    if (empty($nama_produk)) {
        $errors[] = "Nama Produk tidak boleh kosong";
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = "Harga Produk harus berupa angka positif";
    }

    if (!empty($_FILES["gambar"]["tmp_name"]) && !in_array($imageExt, $allowed_file_ext)) {
        $errors[] = "Ekstensi file gambar tidak diizinkan";
    }

    if (empty($errors)) {
        $update = $pdo->prepare("UPDATE produk SET 
            nama_produk = :name, kategori_id = :kategori_id, deskripsi = :deskripsi, harga = :harga, gambar = :gambar
            WHERE id = :produk_id");

        $update->bindParam(':name', $nama_produk);
        $update->bindParam(':kategori_id', $category_id);
        $update->bindParam(':deskripsi', $description);
        $update->bindParam(':harga', $price);
        $update->bindParam(':produk_id', $produk_id);

        if (!empty($_FILES["gambar"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar_lama = $pdo->query("SELECT gambar FROM produk WHERE id = '$produk_id'")->fetchColumn();
                if (!empty($gambar_lama)) {
                    unlink($gambar_lama);
                }
                $update->bindParam(':gambar', $target_file);
            } else {
                echo "<script>alert('Gagal mengunggah gambar')</script>";
            }
        } else {
            $update->bindParam(':gambar', $gambar_lama);
        }

        if ($update->execute()) {
            echo "<script>alert('Data Berhasil Ditambah')</script>";
        } else {
            echo "<script>alert('Data Tidak Berhasil Ditambah')</script>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
    }
}
?>

<?php
include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main">
    <div class="form-section create-form container">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="produk_name">Product Name : </label>
                <input type="text" name="nama_produk" id="produk_name" placeholder="Category Name..." value="<?= $produk['nama_produk'] ?>">
            </div>
            <label for="produk_price">Product Price : </label>
            <input type="number" name="harga" placeholder="Product Price..." id="produk_price" value="<?= $produk['harga'] ?>">
            <label for="product_category">Product Category : </label>
            <select name="kategori_id" id="product_category">
                <?php foreach ($category as $cat) : ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $produk['kategori_id'] ? 'selected' : '' ?>>
                        <?= $cat['nama_kategori'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <label for="description">Product Description : </label>
            <textarea name="deskripsi" id="description" cols="30" rows="10" placeholder="Product Description..."><?= $produk['deskripsi'] ?></textarea>
            <label for="image">Product Description : </label>
            <input type="file" name="gambar" id="image">
            <div class="form-button">
                <a class="button-back" href="index.php">BACK</a>
                <button type="submit" class="button-submit" name="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</section>