<?php
include_once("../../../config/database.php");
session_start();

if ($_SESSION['admin'] == false) {
    header("location: ../../public/auth/login.php");
}
$id = $_GET['id'];

$sql = "DELETE FROM kategori WHERE id = $id";
$result = $pdo->exec($sql);

if ($result) {
    header('location:index.php');
} else {
    echo " <script>alert('Data Tidak Berhasil Dihapus')</script>";
}
