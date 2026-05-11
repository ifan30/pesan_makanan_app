<h2>Keranjang</h2>

<?php
include '../backend/koneksi.php';

$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {
    $data = $conn->query("SELECT * FROM produk WHERE id=$id")->fetch_assoc();
    $subtotal = $data['harga'] * $qty;
    $total += $subtotal;
?>
    <p>
        <?= $data['nama']; ?> 
        (<?= $qty; ?> x Rp<?= $data['harga']; ?>)
        = Rp<?= $subtotal; ?>
    </p>
<?php } ?>

<hr>
<h3>Total: Rp<?= $total; ?></h3>

<a href="checkout.php" class="btn">Checkout</a>