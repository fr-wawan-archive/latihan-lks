<?php

include_once("../../../config/database.php");

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $kat_name = htmlspecialchars($_POST['kategori']);

    if (empty($kat_name)) {
        echo "
            <script>alert('Nama Kategori Tidak Boleh Kosong')</script>
        ";
    } else {
        $update = $pdo->prepare("UPDATE kategori SET nama_kategori=:name WHERE id='$id'");
        $update->bindParam(':name', $kat_name);

        if ($update->execute()) {
            echo " <script>alert('Data Berhasil Diperbarui')</script>";
        } else {
            echo " <script>alert('Data Tidak Berhasil Diperbarui')</script>";
        }
    }
}

?>

<?php
include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");

?>

<section class="main">
    <?php
    $sql = "SELECT * FROM kategori WHERE id='$id'";
    $stmt = $pdo->query($sql);
    while ($rows = $stmt->fetch()) {
        $cat = $rows['nama_kategori'];
    }
    ?>
    <div class="form-section create-form container">
        <form action="" method="post">
            <input type="text" name="kategori" placeholder="Category Name..." value="<?= $cat ?>">
            <div class="form-button">
                <a class="button-back" href="index.php">BACK</a>
                <button type="submit" class="button-submit" name="update">SUBMIT</button>
            </div>
        </form>
    </div>
</section>