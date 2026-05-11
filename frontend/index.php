<?php
include '../backend/koneksi.php';

$pesanan = $conn->query("SELECT * FROM pesanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Pemesanan Makanan</title>

    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header-card">

        <h1>
             Aplikasi Pemesanan Makanan
        </h1>

        <p>
            Melayani pemesanan makanan cepat saji
            dengan mudah dan cepat
        </p>

    </div>

    <!-- FORM ORDER -->
    <div class="card">

        <div class="card-header">
            Tambah Order
        </div>

        <div class="card-body">

            <form method="POST" action="proses.php">

                <label>Nama Customer</label>

                <input
                    type="text"
                    name="nama"
                    required
                >

                <label>Menu Makanan</label>

                <select name="produk">

                    <option>Ayam Geprek</option>

                    <option>Nasi Goreng</option>

                    <option>Mie Ayam</option>

                    <option>Bakso</option>

                    <option>Burger</option>

                    <option>Pizza</option>

                    <option>Kentang Goreng</option>

                </select>

                <label>Jumlah</label>

                <input
                    type="number"
                    name="qty"
                    required
                >

                <button class="btn">
                    Tambah Order
                </button>

            </form>

        </div>

    </div>

    <!-- DAFTAR ORDER -->
    <div class="card">

        <div class="card-header">
            Daftar Order
        </div>

        <div class="card-body">

            <table>

                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Menu</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

                <?php while($row = $pesanan->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?= $row['id']; ?>
                    </td>

                    <td>
                        <?= $row['nama']; ?>
                    </td>

                    <td>
                        <?= $row['produk']; ?>
                    </td>

                    <td>
                        <?= $row['qty']; ?>
                    </td>

                    <td>
                        <span class="status">
                            Diproses
                        </span>
                    </td>

                    <td>

                        <a
                            href="hapus.php?id=<?= $row['id']; ?>"
                            onclick="return confirm('Yakin ingin menghapus order ini?')"
                        >

                            <button class="hapus">
                                Hapus
                            </button>

                        </a>

                    </td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</div>

</body>
</html>