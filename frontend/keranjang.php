<?php
session_start();
$id = $_GET['id'];

$_SESSION['cart'][] = $id;

echo "Produk ditambahkan ke keranjang!<br>";
echo "<a href='checkout.php'>Checkout</a>";
?>