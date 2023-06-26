<?php
include_once("../../../config/database.php");

session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}

$no = 1;


if (isset($_GET['query'])) {
    $sql = "SELECT * FROM kategori WHERE nama_kategori LIKE '%" . $_GET['query'] . "%'";
} else {
    $sql = "SELECT * FROM kategori";
}
$stmt = $pdo->query($sql);

?>
<?php

include_once("../../inc/header.php");
include_once("../../inc/admin_sidebar.php");
?>

<section class="main table-section">
    <a href="create_category.php" class="create-button">Create Category</a>
    <div class="main-header">
        <h1>LIST <span>KATEGORI</span></h1>
        <form action="">
            <input type="text" placeholder="search" name="query">
        </form>
    </div>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
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