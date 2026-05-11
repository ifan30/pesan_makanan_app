<?php
include '../backend/koneksi.php';

$nama = $_POST['nama'];
$produk = $_POST['produk'];
$qty = $_POST['qty'];

$conn->query("INSERT INTO pesanan (nama, produk, qty) 
VALUES ('$nama','$produk','$qty')");

header("Location: index.php");