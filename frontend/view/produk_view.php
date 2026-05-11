<h2>Daftar Produk</h2>

<div class="container">
<?php while($row = $data->fetch_assoc()) { ?>
    <div class="card">
        <h3><?= $row['nama']; ?></h3>
        <p>Harga: Rp<?= $row['harga']; ?></p>
        <a href="keranjang.php?id=<?= $row['id']; ?>" class="btn">Beli</a>
    </div>
<?php } ?>
</div>