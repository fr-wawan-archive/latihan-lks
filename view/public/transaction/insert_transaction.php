<?php

include_once("../../../config/database.php");

session_start();
$jumlah = $_POST['quantity'];

$sql = "INSERT INTO transaksi (customer_id,tanggal,kode_transaksi) VALUES (:customer_id,:tanggal,:kode_transaksi)";

$stmt = $pdo->prepare($sql);
$currentDate = date("Y-m-d");
$invoice = "INV-$currentDate";

$stmt->bindParam(":customer_id", $_SESSION['id']);
$stmt->bindParam(":tanggal", $currentDate);
$stmt->bindParam(":kode_transaksi", $invoice);

$stmt->execute();

$lastInsertId = $pdo->lastInsertId();
foreach ($_SESSION['cart'] as $cart => $value) {
    $sql = "INSERT INTO transaksi_detail (produk_id,jumlah,transaksi_id) VALUES (:produk_id,:jumlah,:transaksi_id)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":produk_id", $cart);
    foreach ($jumlah as $val) {
        $stmt->bindParam(":jumlah", $val);
    }
    $stmt->bindParam(":transaksi_id", $lastInsertId);

    $stmt->execute();
}

unset($_SESSION['cart']);

header("location:../cart/index.php");
