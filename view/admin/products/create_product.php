<?php

include_once("../../../config/database.php");

if (isset($_POST['submit'])) {
    $kat_name = htmlspecialchars($_POST['kategori']);

    if (empty($kat_name)) {
        echo "
            <script>alert('Nama Kategori Tidak Boleh Kosong')</script>
        ";
    } else {
        $insert = $pdo->prepare("INSERT INTO kategori (nama_kategori) value (:name)");
        $insert->bindParam(':name', $kat_name);

        if ($insert->execute()) {
            echo " <script>alert('Data Berhasil Ditambah')</script>";
        } else {
            echo " <script>alert('Data Tidak Berhasil Ditambah')</script>";
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
        <form action="" method="post">
            <input type="text" name="produk_name" placeholder="Category Name...">
            <input type="number" name="harga" placeholder="Category Name...">
            <select name="kategori_id" id="">
                <option value=""></option>
            </select>
            <textarea name="description" id="description" cols="30" rows="10">

            </textarea>
            <input type="file" name="image" id="image">
            <input type="text" name="produk_name" placeholder="Category Name...">
            <div class="form-button">
                <a class="button-back" href="index.php">BACK</a>
                <button type="submit" class="button-submit" name="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</section>