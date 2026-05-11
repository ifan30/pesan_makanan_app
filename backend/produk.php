<?php
include 'koneksi.php';

$data = $conn->query("SELECT * FROM produk");

return $data;
?>