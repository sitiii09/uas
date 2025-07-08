<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM warga WHERE id=$id");
header("Location: index.php");
?>