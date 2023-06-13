<?php
include_once("../../../config/database.php");
session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM produk WHERE id = $id";
$result = $pdo->query($sql);

while ($rows = $result->fetch()) {
    $row = $rows;
}

if (isset($_POST['quantity'])) {
    if (isset($_SESSION['cart'][$id]['jumlah'])) {
        $jumlah = $_SESSION['cart'][$id]['jumlah'] + $_POST['quantity'];
    } else {
        $jumlah = $_POST['quantity'];
    }
} else {
    if (isset($_SESSION['cart'][$id]['jumlah'])) {
        $jumlah = $_SESSION['cart'][$id]['jumlah'] + 1;
    } else {
        $jumlah = 1;
    }
}


$_SESSION["cart"][$id] = [
    "gambar" => $row['gambar'],
    "nama_produk" => $row['nama_produk'],
    "harga" => $row['harga'],
    "jumlah" => $jumlah

];


header("location:index.php");
