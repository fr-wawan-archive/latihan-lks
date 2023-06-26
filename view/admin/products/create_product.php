<?php

include_once("../../../config/database.php");
session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}

$sql = "SELECT * FROM kategori";
$category = $pdo->query($sql);



if (isset($_POST['submit'])) {
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $price = htmlspecialchars($_POST['harga']);
    $category_id = htmlspecialchars($_POST['kategori_id']);
    $description = htmlspecialchars($_POST['deskripsi']);

    $target_dir = "../../images/products/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_file_ext = ["jpg", "jpeg", "png", "webp"];

    $finalFile = $target_dir . uniqid(rand(), true) . "." . $imageExt;

    $errors = [];

    if (empty($nama_produk)) {
        $errors[] = "Nama Produk tidak boleh kosong";
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = "Harga Produk harus berupa angka positif";
    }

    if (!in_array($imageExt, $allowed_file_ext)) {
        $errors[] = "Ekstensi file gambar tidak diizinkan";
    }

    if (empty($errors)) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $finalFile)) {

            $insert = $pdo->prepare("INSERT INTO produk (nama_produk,kategori_id,deskripsi,harga,gambar) value (:name,:kategori_id,:deskripsi,:harga,:gambar)");
            $insert->bindParam(':name', $nama_produk);
            $insert->bindParam(':kategori_id', $category_id);
            $insert->bindParam(':deskripsi', $description);
            $insert->bindParam(':harga', $price);
            $insert->bindParam(':gambar', $finalFile);

            if ($insert->execute()) {
                echo " <script>alert('Data Berhasil Dibuat')</script>";
            } else {
                echo " <script>alert('Data Tidak Berhasil Dibuat')</script>";
            }
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
                <input type="text" name="nama_produk" id="produk_name" placeholder="Product Name...">
            </div>
            <label for="produk_price">Product Price : </label>
            <input type="number" name="harga" placeholder="Product Price..." id="produk_price">
            <label for="product_category">Product Category : </label>
            <select name="kategori_id" id="product_category">
                <?php foreach ($category as $cat) : ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['nama_kategori'] ?></option>
                <?php endforeach ?>
            </select>
            <label for="description">Product Description : </label>
            <textarea name="deskripsi" id="description" cols="30" rows="10" placeholder="Product Description..."></textarea>
            <label for="image">Product Images : </label>
            <input type="file" name="gambar" id="image">
            <div class="form-button">
                <a class="button-back" href="index.php">BACK</a>
                <button type="submit" class="button-submit" name="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</section>