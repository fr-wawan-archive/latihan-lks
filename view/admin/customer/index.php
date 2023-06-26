<?php
include_once("../../../config/database.php");

session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}

$no = 1;

if (isset($_GET['query'])) {
    $sql = "SELECT * FROM customer WHERE nama_lengkap LIKE '%" . $_GET['query'] . "%'";
} else {
    $sql = "SELECT * FROM customer";
}
$stmt = $pdo->query($sql);

?>

<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <div class="main-header">
        <h1>LIST <span>CUSTOMER</span></h1>
        <form action="">
            <input type="text" placeholder="search" name="query">
        </form>
    </div>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>NO Handphone</th>
        </tr>

        <?php foreach ($stmt as $row) : ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row['nama_lengkap'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</section>